<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        $pegawais = [
            ['nama' => 'Evan Ernanda, S.Kom', 'nip' => '19710312 200502 1 001', 'jabatan' => 'Kepala Dinas'],
            ['nama' => 'dr. Lulu Nonaria', 'nip' => '19760601 200502 2 006', 'jabatan' => 'Sekretaris'],
            ['nama' => 'Gunawan, S.Pd', 'nip' => '19681213 199803 1 005', 'jabatan' => 'Kabid Statistik dan Persandian'],
            ['nama' => 'Fredrik Manumpak Hamonangan Situmeang, S.Kom', 'nip' => '19830216 200604 1 009', 'jabatan' => 'Kabid Informasi dan Komunikasi Publik'],
            ['nama' => 'Hery Ristiawan, S.Sos, M.Eng', 'nip' => '19850915 200903 1 003', 'jabatan' => 'Kepala Bidang Aplikasi dan Informatika'],
            ['nama' => 'Dedi Wahyudi, S.IP., M.H', 'nip' => '19860630 200903 1 003', 'jabatan' => 'Kasubbag Umum, Kepegawaian dan Aset'],
            ['nama' => 'Sri Lestari Utaminingsih, SE', 'nip' => '19761126 200502 2 003', 'jabatan' => 'Kepala Sub Bagian Perencanaan, Evaluasi Kinerja dan Keuangan'],
            ['nama' => 'Ahmad Maulana, S.Si, ME', 'nip' => '19800225 200604 1 005', 'jabatan' => 'Kepala Seksi Statistik Sektoral'],
            ['nama' => 'Sy.M.Hendra, SE', 'nip' => '19821209 201001 1 015', 'jabatan' => 'Kepala Seksi Persandian'],
            ['nama' => 'Lia Savona, S.Sos', 'nip' => '19780728 200312 2 009', 'jabatan' => 'Pranata Hubungan Masyarakat Ahli Muda'],
            ['nama' => 'Arfianshah, S.Kom, ME', 'nip' => '19800811 200803 1 001', 'jabatan' => 'Pranata Hubungan Masyarakat Ahli Muda'],
            ['nama' => 'Andrie Yadiartanto, S.Kom', 'nip' => '19810314 201001 1 013', 'jabatan' => 'Pranata Komputer Ahli Muda'],
            ['nama' => 'Rosmiati', 'nip' => '19760909 200604 2 004', 'jabatan' => 'Analis Jabatan'],
            ['nama' => 'Dessy Angelia, A.Md.Ak', 'nip' => '19910912 202203 2 007', 'jabatan' => 'Pengelola Barang Milik Negara'],
            ['nama' => 'Dimas Nugroho, A.Md.Ak', 'nip' => '19991118 202203 1 001', 'jabatan' => 'Pengelola Barang Milik Negara'],
            ['nama' => 'Erika Mandasari, S.IP', 'nip' => '19850312 200903 2 013', 'jabatan' => 'Penyusun Program, Anggaran dan Pelaporan'],
            ['nama' => 'Hudaya Tirta Mulyo, A.Md', 'nip' => '19860702 201101 1 012', 'jabatan' => 'Bendahara'],
            ['nama' => 'Dedy Peryadi', 'nip' => '19830902 200312 1 002', 'jabatan' => 'Pengelola Keuangan'],
            ['nama' => 'Filia Ramadhini, A.Md.Ak', 'nip' => '19991224 202203 2 006', 'jabatan' => 'Pengelola Keuangan'],
            ['nama' => 'Elza Aprianza', 'nip' => '19830410 201212 1 001', 'jabatan' => 'Pengelola Pengaduan Publik'],
            ['nama' => 'Erfariandi, S.Kom', 'nip' => '19911115 202203 1 005', 'jabatan' => 'Perancang Grafis'],
            ['nama' => 'May Ihsan Saputra, S.IP', 'nip' => '19840513 200701 1 004', 'jabatan' => 'Analis Publikasi'],
            ['nama' => 'Agun Setiawan, A.Md', 'nip' => '19860819 202203 1 002', 'jabatan' => 'Pengelola TV dan Radio'],
            ['nama' => 'Rachmad Nurgiyanto, A.Md', 'nip' => '19961229 202203 1 006', 'jabatan' => 'Operator Komunikasi'],
            ['nama' => 'Afrilando A.D.I, A.Md.Kom', 'nip' => '19970430 202203 1 013', 'jabatan' => 'Pengelola Situs/Web'],
            ['nama' => 'Santriansyah, A.Md.Kom', 'nip' => '19970420 202203 1 006', 'jabatan' => 'Teknisi Jaringan Instalasi'],
            ['nama' => 'Rizal, A.Md.Kom', 'nip' => '19951125 202203 1 008', 'jabatan' => 'Pengelola Instalasi Teknologi Informatika'],
            ['nama' => 'Gilang Habibie, S.Stat', 'nip' => '19980219 202203 1 009', 'jabatan' => 'Analisis Statistik'],
            ['nama' => 'Fanny Meirista, S.Kom', 'nip' => '19940503 202203 1 007', 'jabatan' => 'Analisis Keamanan Siber'],
            ['nama' => 'Yoyok, A.Md', 'nip' => '19790214 201001 1 013', 'jabatan' => 'Statistisi Mahir'],
            ['nama' => 'Dhesta Adeangga Juanda, S.Kom', 'nip' => '19941207 202321 1 014', 'jabatan' => 'Pranata Komputer'],
            ['nama' => 'Tommi Hardi, S.Kom', 'nip' => '19900519 202321 1 022', 'jabatan' => 'Pranata Komputer'],
            ['nama' => 'Della Widyaningtyas, S.Kom', 'nip' => '19950714 202321 2 042', 'jabatan' => 'Pranata Komputer'],
        ];

        foreach ($pegawais as $data) {
            Pegawai::firstOrCreate(
                ['nip' => $data['nip']],
                $data
            );
        }
    }
}

