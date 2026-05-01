<?php
// app/Http/Controllers/AiGeneratorController.php

namespace App\Http\Controllers;

use App\Models\InformasiRencanaPerubahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AiGeneratorController extends Controller
{
    use AuthorizesRequests;

    /**
     * ════════════════════════════════════════════════════════════════
     * Generate PER-FIELD (Arsitektur Baru)
     * ════════════════════════════════════════════════════════════════
     * Menerima SATU nama field, membuat prompt spesifik hanya untuk
     * field tersebut, dan mengembalikan PLAIN STRING (bukan JSON).
     * → Prompt jauh lebih kecil → lebih cepat → jarang kena 429.
     * → Parsing JS super simpel: langsung isi value textarea.
     *
     * POST /dokumen/{dokuman}/ai-generate-field
     * Body JSON: { "field": "deskripsi" | "risiko" | "dampak" | "mitigasi"
     *                      | "persiapan_deskripsi" | "pelaksanaan_deskripsi"
     *                      | "keterangan" | "penugasan" }
     */
    public function generatePerField(Request $request, InformasiRencanaPerubahan $dokuman)
    {
        $this->authorize('view', $dokuman);

        $allowedFields = [
            // Analisis
            'deskripsi', 'risiko', 'dampak', 'mitigasi',
            // Pengembangan
            'persiapan_deskripsi', 'pelaksanaan_deskripsi',
            // Pemantauan
            'keterangan', 'penugasan',
        ];

        $request->validate([
            'field' => 'required|in:' . implode(',', $allowedFields),
        ]);

        $field  = $request->input('field');
        $apiKey = config('services.gemini.key');
        $model  = config('services.gemini.model', 'gemini-2.0-flash');

        if (empty($apiKey) || $apiKey === 'your-gemini-api-key-here') {
            return response()->json([
                'success' => false,
                'message' => 'Gemini API Key belum dikonfigurasi. Silakan isi GEMINI_API_KEY di file .env.',
            ], 503);
        }

        // ── Konteks dokumen (hanya field non-sensitif) ─────────────────────────
        $judul   = $dokuman->judul ?? '-';
        $lingkup = is_array($dokuman->lingkup_perubahan)
            ? implode(', ', $dokuman->lingkup_perubahan)
            : ($dokuman->lingkup_perubahan ?? '-');
        $target  = $dokuman->target_penyelesaian
            ? \Carbon\Carbon::parse($dokuman->target_penyelesaian)->format('d F Y')
            : '-';
        $lokasi  = $dokuman->lokasi ?? '-';

        // ── Bangun prompt per-field ────────────────────────────────────────────
        $prompt = $this->buildFieldPrompt($field, $judul, $lingkup, $target, $lokasi);

        // ── Panggil Gemini API (output: plain text, bukan JSON) ───────────────
        try {
            $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";
            $payload  = [
                'contents' => [
                    ['role' => 'user', 'parts' => [['text' => $prompt]]],
                ],
                'generationConfig' => [
                    // Tidak pakai responseMimeType JSON → output plain text
                    'temperature'     => 0.65,
                    'maxOutputTokens' => 512,   // Kecil = cepat, jarang 429
                ],
            ];

            $response = $this->callGeminiWithRetry($endpoint, $payload, maxRetries: 3);
            $body     = $response->json();
            $text     = trim($body['candidates'][0]['content']['parts'][0]['text'] ?? '');

            if (!$text) {
                return response()->json(['success' => false, 'message' => 'Respons AI kosong.'], 500);
            }

            // Bersihkan sisa markdown code fence jika ada
            $text = preg_replace('/^```[a-z]*\s*/i', '', $text);
            $text = preg_replace('/```\s*$/', '', $text);
            $text = trim($text);

            return response()->json(['success' => true, 'text' => $text]);

        } catch (\App\Exceptions\GeminiRateLimitException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Kuota API Gemini tercapai. Tunggu 1-2 menit lalu coba lagi.',
            ], 429);
        } catch (\App\Exceptions\GeminiApiException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 502);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Gemini Connection Error', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Tidak dapat terhubung ke Gemini API. Periksa koneksi internet.',
            ], 503);
        } catch (\Exception $e) {
            Log::error('AI Field Generate Error', ['field' => $field, 'error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Bangun prompt SPESIFIK dan RINGKAS per field.
     * Output yang diharapkan: plain text Indonesia (bukan JSON).
     */
    private function buildFieldPrompt(
        string $field,
        string $judul,
        string $lingkup,
        string $target,
        string $lokasi
    ): string {
        $konteks = "Konteks Perubahan Sistem:\n"
            . "- Judul  : {$judul}\n"
            . "- Lingkup: {$lingkup}\n"
            . "- Target : {$target}\n"
            . "- Lokasi : {$lokasi}";

        $instruksi = match ($field) {

            // ── ANALISIS ─────────────────────────────────────────────────────
            'deskripsi' =>
                "Tulis HANYA paragraf deskripsi teknis (2-3 paragraf, bahasa Indonesia formal) yang menjelaskan "
                . "apa yang akan diubah, mengapa perlu diubah, dan bagaimana cara pelaksanaannya secara umum. "
                . "Jangan tambahkan judul, label, atau penjelasan tambahan. Langsung isi teks.",

            'risiko' =>
                "Identifikasi 3-5 risiko teknis dan operasional yang mungkin terjadi akibat perubahan ini. "
                . "Format output: daftar bernomor, satu risiko per baris, bahasa Indonesia formal. "
                . "Contoh: 1. Risiko downtime saat migrasi database... 2. Risiko konflik versi dependensi...\n"
                . "Jangan tambahkan judul atau kalimat pembuka.",

            'dampak' =>
                "Jelaskan dampak perubahan ini terhadap: (a) sistem yang berjalan, (b) pengguna/stakeholder, "
                . "(c) proses bisnis. Tulis dalam 2-3 paragraf singkat, bahasa Indonesia formal. "
                . "Langsung tulis isinya, tanpa judul atau label.",

            'mitigasi' =>
                "Berikan 4-5 langkah mitigasi risiko yang konkret dan teknis untuk perubahan ini. "
                . "Format output: daftar bernomor, satu langkah per baris, bahasa Indonesia formal. "
                . "Contoh: 1. Lakukan backup database sebelum migrasi... 2. Uji di environment staging terlebih dahulu...\n"
                . "Jangan tambahkan judul atau kalimat pembuka.",

            // ── PENGEMBANGAN ─────────────────────────────────────────────────
            'persiapan_deskripsi' =>
                "Buat daftar tahapan PERSIAPAN teknis yang harus dilakukan SEBELUM implementasi perubahan. "
                . "Cakup: analisis kebutuhan, backup data/kode, setup environment dev/staging, review kode existing. "
                . "Format output: daftar bernomor, bahasa Indonesia formal, langsung tanpa judul. "
                . "Contoh: 1. Lakukan backup database... 2. Setup environment staging...",

            'pelaksanaan_deskripsi' =>
                "Buat langkah-langkah teknis PELAKSANAAN perubahan di Laravel secara berurutan. "
                . "Cakup: pembuatan/modifikasi migration, model, controller, routes, views, testing, deployment. "
                . "Format output: daftar bernomor, bahasa Indonesia formal, langsung tanpa judul. "
                . "Contoh: 1. Buat file migration baru... 2. Update Model dan fillable...",

            // ── PEMANTAUAN ───────────────────────────────────────────────────
            'keterangan' =>
                "Jelaskan apa saja yang harus DIPANTAU setelah perubahan ini di-release. "
                . "Cakup: metrics/KPI, error log (storage/logs/laravel.log), response time API, "
                . "feedback pengguna, dan kriteria sukses implementasi. "
                . "Format: daftar bernomor, bahasa Indonesia formal, langsung tanpa judul.",

            'penugasan' =>
                "Buat detail PENUGASAN tim untuk pemantauan pasca-release. "
                . "Cakup: siapa yang bertanggung jawab (developer, QA, admin sistem), jadwal pemantauan "
                . "(harian/mingguan), dan prosedur eskalasi jika ditemukan masalah. "
                . "Format: daftar bernomor atau paragraf singkat, bahasa Indonesia formal, langsung tanpa judul.",

            default => "Hasilkan teks profesional dalam bahasa Indonesia yang relevan untuk field '{$field}'.",
        };

        return "Anda adalah asisten teknis sistem informasi pemerintahan.\n\n"
            . "{$konteks}\n\n"
            . "TUGAS ANDA:\n{$instruksi}\n\n"
            . "ATURAN KETAT:\n"
            . "- Bahasa Indonesia formal dan teknis.\n"
            . "- Sesuaikan dengan konteks perubahan di atas.\n"
            . "- Output HANYA teks isinya saja. JANGAN menulis JSON, markdown, atau penjelasan tambahan.\n"
            . "- Maksimal 300 kata.";
    }

    /**
     * ════════════════════════════════════════════════════════════════
     * Panggil Gemini API dengan Exponential Backoff Retry.
     * Jeda: 2s → 4s → 8s. Hanya retry untuk 429 dan 503.
     * ════════════════════════════════════════════════════════════════
     */
    private function callGeminiWithRetry(string $endpoint, array $payload, int $maxRetries = 3): \Illuminate\Http\Client\Response
    {
        $baseDelay = 2;

        for ($attempt = 0; $attempt <= $maxRetries; $attempt++) {
            $response = Http::timeout(45)->post($endpoint, $payload);

            if ($response->successful()) {
                if ($attempt > 0) {
                    Log::info("Gemini API berhasil setelah {$attempt} retry.");
                }
                return $response;
            }

            $status = $response->status();

            if (in_array($status, [429, 503]) && $attempt < $maxRetries) {
                $delay      = $baseDelay * pow(2, $attempt);
                $retryAfter = $response->header('Retry-After');
                if ($retryAfter && is_numeric($retryAfter)) {
                    $delay = max($delay, (int) $retryAfter);
                }
                Log::warning("Gemini {$status} – Retry {$attempt}/{$maxRetries} setelah {$delay}s");
                sleep($delay);
                continue;
            }

            if ($status === 429) {
                throw new \App\Exceptions\GeminiRateLimitException("Rate limit setelah {$maxRetries} percobaan.");
            }

            Log::error('Gemini API Error', ['status' => $status, 'body' => $response->body()]);
            throw new \App\Exceptions\GeminiApiException("Gemini API error. Kode: {$status}");
        }

        throw new \App\Exceptions\GeminiRateLimitException('Semua retry habis.');
    }

    /**
     * Generate text returning plain text (Template fill-in-the-blank)
     */
    public function generateTemplate(Request $request)
    {
        $kategori = $request->input('kategori');
        $temaSistem = $request->input('temaSistem', 'Sistem Informasi Umum');

        $prompt = "Kamu adalah asisten IT di Diskominfo Singkawang. Buatkan template paragraf untuk mengisi kolom form '{$kategori}' pada aplikasi Permintaan Perubahan Sistem. Tema perubahannya terkait: '{$temaSistem}'.\n"
                . "Aturan:\n"
                . "- Sediakan bagian yang rumpang dengan format '[isi sendiri]' atau '[sebutkan dampaknya]' agar user bisa mengetik manual bagian tersebut.\n"
                . "- Contoh gaya bahasa: 'Terdapat permasalahan pada sistem [isi sendiri] yang dikelola oleh Diskominfo Singkawang, sehingga memerlukan perubahan pada...'\n"
                . "- HANYA berikan teks template-nya saja, tanpa basa-basi, tanpa markdown formatting yang berlebihan, dan kembalikan sebagai plain text.";

        $apiKey = env('GEMINI_API_KEY') ?: config('services.gemini.key');
        $model = config('services.gemini.model', 'gemini-2.0-flash');
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key=" . $apiKey;

        try {
            $response = Http::post($url, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    $hasilTeks = trim($data['candidates'][0]['content']['parts'][0]['text']);
                    
                    // KEMBALIKAN SEBAGAI PLAIN TEXT
                    return response($hasilTeks, 200)->header('Content-Type', 'text/plain');
                }
                
                Log::error('Gemini API No Text', ['response' => $data]);
            } else {
                Log::error('Gemini API Error', ['status' => $response->status(), 'body' => $response->body()]);
            }
            
            // JIKA TERJADI ERROR APA PUN (429 Limit Habis, 404 Model Not Found, dll)
            // GUNAKAN FALLBACK TEMPLATE AGAR FITUR TETAP BERJALAN DENGAN MULUS!
            $fallbacks = [
                'risiko' => [
                    "Terdapat risiko operasional pada sistem [isi nama sistem] yang dikelola oleh Diskominfo Singkawang, sehingga memerlukan antisipasi pada [sebutkan antisipasi].",
                    "Potensi gangguan pada sistem [isi nama sistem] dapat berdampak pada layanan publik Diskominfo Singkawang. Langkah pencegahan yang disarankan adalah [sebutkan pencegahan].",
                    "Analisis menunjukkan adanya risiko teknis terkait [sebutkan risiko] pada sistem [isi nama sistem]. Hal ini perlu ditangani oleh Diskominfo Singkawang melalui [sebutkan penanganan].",
                    "Kendala pada sistem [isi nama sistem] berpotensi mengganggu proses bisnis di Diskominfo Singkawang. Diperlukan strategi mitigasi berupa [sebutkan strategi].",
                ],
                'deskripsi' => [
                    "Sistem [isi nama sistem] yang dikelola oleh Diskominfo Singkawang membutuhkan perubahan karena [isi alasan perubahan]. Pelaksanaan perubahan akan dilakukan dengan cara [sebutkan cara].",
                    "Untuk meningkatkan efisiensi, Diskominfo Singkawang merencanakan pembaruan pada sistem [isi nama sistem]. Fokus utama perubahan adalah [sebutkan fokus perubahan].",
                    "Perubahan sistem [isi nama sistem] diajukan guna mengatasi masalah [sebutkan masalah]. Diskominfo Singkawang akan melakukan pembaruan pada modul [sebutkan modul].",
                    "Sesuai kebutuhan layanan Diskominfo Singkawang, sistem [isi nama sistem] akan disesuaikan dengan fitur tambahan berupa [sebutkan fitur].",
                ],
                'dampak' => [
                    "Perubahan pada sistem [isi nama sistem] akan memberikan dampak terhadap [sebutkan pihak yang terdampak] dan proses bisnis di Diskominfo Singkawang, yaitu berupa [sebutkan dampaknya].",
                    "Implementasi sistem [isi nama sistem] diharapkan dapat mempercepat layanan Diskominfo Singkawang, dengan dampak signifikan pada [sebutkan dampak].",
                    "Pembaruan ini akan memengaruhi [sebutkan pengguna/sistem lain]. Diskominfo Singkawang memastikan transisi akan berjalan dengan efek [sebutkan efek transisi].",
                    "Dampak utama dari perubahan sistem [isi nama sistem] adalah penyesuaian pada alur kerja [sebutkan alur], yang akan meningkatkan efektivitas layanan Diskominfo Singkawang.",
                ],
                'mitigasi' => [
                    "Untuk mengurangi risiko pada sistem [isi nama sistem], Diskominfo Singkawang akan melakukan mitigasi berupa [sebutkan langkah mitigasi].",
                    "Sebagai langkah pengamanan, tim Diskominfo Singkawang telah menyiapkan *backup* sistem [isi nama sistem] dan prosedur [sebutkan prosedur].",
                    "Strategi mitigasi untuk sistem [isi nama sistem] meliputi [sebutkan strategi awal] dan pemantauan berkala oleh tim teknis Diskominfo Singkawang.",
                    "Diskominfo Singkawang menerapkan tindakan preventif berupa [sebutkan tindakan] untuk meminimalkan kendala selama transisi sistem [isi nama sistem].",
                ],
                'persiapan_deskripsi' => [
                    "Tahap persiapan perubahan sistem [isi nama sistem] meliputi [sebutkan tahapan], yang akan dikoordinasikan oleh tim Diskominfo Singkawang.",
                    "Sebelum implementasi, Diskominfo Singkawang akan melakukan [sebutkan kegiatan persiapan] pada sistem [isi nama sistem] untuk memastikan kesiapan infrastruktur.",
                    "Persiapan teknis untuk sistem [isi nama sistem] mencakup penyediaan [sebutkan kebutuhan teknis] dan uji coba awal di lingkungan Diskominfo Singkawang.",
                    "Tim pengembang Diskominfo Singkawang menjadwalkan persiapan sistem [isi nama sistem] dengan fokus pada [sebutkan fokus persiapan].",
                ],
                'pelaksanaan_deskripsi' => [
                    "Pelaksanaan perubahan pada sistem [isi nama sistem] dilakukan dengan langkah-langkah [sebutkan langkah-langkah] oleh Diskominfo Singkawang.",
                    "Proses deployment sistem [isi nama sistem] dijadwalkan pada [sebutkan waktu], dengan tahapan eksekusi berupa [sebutkan tahapan eksekusi] oleh Diskominfo Singkawang.",
                    "Tim Diskominfo Singkawang akan menerapkan pembaruan sistem [isi nama sistem] melalui metode [sebutkan metode] secara bertahap.",
                    "Eksekusi teknis untuk perubahan sistem [isi nama sistem] mencakup konfigurasi ulang pada [sebutkan komponen] sesuai standar Diskominfo Singkawang.",
                ],
                'keterangan' => [
                    "Pasca-rilis sistem [isi nama sistem], pemantauan akan difokuskan pada metrik [sebutkan metrik] yang dikelola Diskominfo Singkawang.",
                    "Sistem [isi nama sistem] saat ini beroperasi dengan status [sebutkan status]. Evaluasi performa akan dilakukan oleh Diskominfo Singkawang.",
                    "Hasil pantauan awal sistem [isi nama sistem] menunjukkan kondisi [sebutkan kondisi], dan memerlukan tindak lanjut berupa [sebutkan tindak lanjut].",
                    "Keterangan teknis dari Diskominfo Singkawang mencatat bahwa sistem [isi nama sistem] berjalan normal dengan catatan [sebutkan catatan khusus].",
                ],
                'penugasan' => [
                    "Pemantauan sistem [isi nama sistem] ditugaskan kepada [sebutkan nama/tim] di Diskominfo Singkawang dengan jadwal [sebutkan jadwal].",
                    "Tim [sebutkan nama tim] dari Diskominfo Singkawang bertanggung jawab untuk mengawasi stabilitas sistem [isi nama sistem] selama fase transisi.",
                    "Penugasan maintenance sistem [isi nama sistem] diberikan kepada [sebutkan personil] dengan tugas utama [sebutkan tugas spesifik].",
                    "Koordinasi pemantauan sistem [isi nama sistem] dipegang oleh [sebutkan nama koordinator] dari Diskominfo Singkawang.",
                ],
            ];
            
            $pilihan = $fallbacks[$kategori] ?? [
                "Terdapat penyesuaian pada sistem [isi nama sistem] yang dikelola oleh Diskominfo Singkawang. Hal ini berkaitan dengan tema {$temaSistem}.\nBagian ini memerlukan [isi tindakan yang perlu dilakukan] agar dapat [sebutkan tujuan/dampaknya]."
            ];
            
            $fallback = $pilihan[array_rand($pilihan)];
            
            // Kembalikan fallback sebagai respon normal (200) agar masuk ke textarea
            return response($fallback, 200)->header('Content-Type', 'text/plain');

        } catch (\Exception $e) {
            Log::error('Gemini Exception', ['error' => $e->getMessage()]);
            return response("Terjadi kesalahan: " . $e->getMessage(), 500)->header('Content-Type', 'text/plain');
        }
    }
}
