<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Analisis Perubahan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --pastel-blue: #a7c7e7;
            --pastel-blue-light: #d4e4f7;
            --pastel-blue-lighter: #e8f0fe;
            --neon-blue: #00b4d8;
            --neon-blue-dark: #0096c7;
            --neon-blue-light: #90e0ef;
            --text-dark: #2c3e50;
            --shadow: rgba(0, 180, 216, 0.15);
        }
        body {
            background: linear-gradient(135deg, var(--pastel-blue-lighter) 0%, var(--pastel-blue-light) 100%);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        .navbar-custom {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 0.8rem 1rem;
        }
        .navbar-brand { font-weight: 700; font-size: 1.5rem; color: white !important; display: flex; align-items: center; }
        .navbar-brand i { margin-right: 10px; font-size: 1.8rem; }
        .user-info { display: flex; align-items: center; color: white; }
        .user-name { margin-right: 15px; font-weight: 500; }
        .btn-logout {
            background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.3);
            color: white; border-radius: 6px; padding: 0.4rem 1rem;
            transition: all 0.3s ease; text-decoration: none;
        }
        .btn-logout:hover { background: rgba(255,255,255,0.3); color: white; transform: translateY(-2px); }
        .card {
            border: none; border-radius: 15px;
            box-shadow: 0 10px 30px var(--shadow);
            overflow: hidden; background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
        }
        .card-header {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            color: white; border-bottom: none; padding: 1.5rem;
        }
        .card-header h2 { margin: 0; font-weight: 600; font-size: 1.5rem; }
        .header-glow { text-shadow: 0 0 10px rgba(255,255,255,0.7); }
        .form-container { padding: 2rem; }
        .form-label { font-weight: 600; color: var(--text-dark); margin-bottom: 0.5rem; }
        .form-control, .form-select {
            border: 2px solid var(--pastel-blue); border-radius: 8px;
            padding: 0.75rem; transition: all 0.3s ease; background-color: white;
        }
        .form-control:focus, .form-select:focus { border-color: var(--neon-blue); box-shadow: 0 0 0 0.25rem rgba(0,180,216,0.25); }
        .form-control:hover, .form-select:hover { border-color: var(--neon-blue-light); }
        textarea.form-control { min-height: 120px; resize: vertical; }
        .btn-primary {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            border: none; border-radius: 8px; padding: 0.75rem 2rem;
            font-weight: 600; transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,180,216,0.3);
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,180,216,0.4); }
        .btn-secondary {
            background: linear-gradient(135deg, #78909C, #90A4AE);
            border: none; border-radius: 8px; padding: 0.75rem 2rem;
            font-weight: 600; transition: all 0.3s ease; color: white;
        }
        .btn-secondary:hover { transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.15); }
        .form-section {
            margin-bottom: 2rem; padding: 1.5rem;
            border-radius: 10px; background: var(--pastel-blue-lighter);
            border-left: 4px solid var(--neon-blue);
        }
        .section-header {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 1rem;
        }
        .section-title {
            color: var(--neon-blue-dark); font-weight: 600; font-size: 1rem;
            display: flex; align-items: center; gap: 8px; margin: 0;
        }

        /* ══════════════════════════════════════════════════════════════
           TOMBOL AI PER-FIELD — kecil, badge-style, di sebelah judul
        ══════════════════════════════════════════════════════════════ */
        .btn-ai-field {
            background: linear-gradient(135deg, #7c3aed, #a855f7);
            color: white; border: none; border-radius: 20px;
            padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 600;
            cursor: pointer; transition: all 0.25s ease;
            box-shadow: 0 2px 8px rgba(124,58,237,0.35);
            display: inline-flex; align-items: center; gap: 4px;
            white-space: nowrap; flex-shrink: 0;
        }
        .btn-ai-field:hover:not(:disabled) {
            background: linear-gradient(135deg, #6d28d9, #9333ea);
            transform: translateY(-1px); box-shadow: 0 4px 12px rgba(124,58,237,0.5);
            color: white;
        }
        .btn-ai-field:disabled { opacity: 0.65; cursor: not-allowed; transform: none; }
        .btn-ai-field .spin { animation: spin 0.8s linear infinite; display: inline-block; }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* Highlight animasi setelah field terisi */
        .ai-filled {
            border-color: #a855f7 !important;
            background-color: rgba(167,139,250,0.08) !important;
            transition: all 0.4s ease !important;
        }

        /* Toast */
        .ai-toast {
            position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 10000;
            min-width: 280px; border-radius: 10px; padding: 0.85rem 1.2rem;
            color: white; font-weight: 500; font-size: 0.9rem;
            display: flex; align-items: center; gap: 10px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25); opacity: 0;
            transition: opacity 0.3s, transform 0.3s;
            transform: translateX(20px);
        }
        .ai-toast.show { opacity: 1; transform: translateX(0); }
        .ai-toast.success { background: linear-gradient(135deg, #059669, #10b981); }
        .ai-toast.error   { background: linear-gradient(135deg, #dc2626, #ef4444); }
        .ai-toast.warning { background: linear-gradient(135deg, #d97706, #f59e0b); }

        @media (max-width: 768px) {
            .user-info { flex-direction: column; align-items: flex-end; }
            .user-name { margin-right: 0; margin-bottom: 5px; }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-file-contract"></i>DocManager
            </a>
            <div class="user-info">
                <span class="user-name">
                    <i class="fas fa-user-circle me-1"></i>
                    {{ Auth::user()->name ?? 'Nama User' }}
                </span>
                <a href="{{ route('logout') }}" class="btn-logout"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="header-glow"><i class="fas fa-chart-bar me-2"></i>Edit Analisis Perubahan</h2>
                    </div>
                    <div class="form-container">
                        <form method="POST" action="{{ route('analisis.update', $dokuman) }}">
                            @csrf
                            @method('PUT')

                            {{-- ═══════════ DESKRIPSI ═══════════ --}}
                            <div class="form-section">
                                <div class="section-header">
                                    <h5 class="section-title">
                                        <i class="fas fa-align-left"></i>Deskripsi Perubahan
                                    </h5>
                                    <button type="button" class="btn-ai-field"
                                            onclick="generateTemplateAI('deskripsi', 'deskripsi', this)">
                                        <i class="fas fa-robot"></i> AI Generate
                                    </button>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi', $analisis->deskripsi) }}</textarea>
                                </div>
                            </div>

                            {{-- ═══════════ PRIORITAS & KATEGORI + RISIKO ═══════════ --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <div class="section-header">
                                            <h5 class="section-title">
                                                <i class="fas fa-sort-amount-up"></i>Prioritas &amp; Kategori
                                            </h5>
                                        </div>
                                        <div class="mb-3">
                                            <label for="prioritas" class="form-label">Prioritas</label>
                                            <select name="prioritas" id="prioritas" class="form-select" required>
                                                <option value="Tinggi" {{ old('prioritas', $analisis->prioritas) == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                                                <option value="Sedang" {{ old('prioritas', $analisis->prioritas) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                                <option value="Rendah" {{ old('prioritas', $analisis->prioritas) == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori</label>
                                            <select name="kategori" id="kategori" class="form-select" required>
                                                <option value="Darurat" {{ old('kategori', $analisis->kategori) == 'Darurat' ? 'selected' : '' }}>Darurat</option>
                                                <option value="Major"   {{ old('kategori', $analisis->kategori) == 'Major'   ? 'selected' : '' }}>Major</option>
                                                <option value="Minor"   {{ old('kategori', $analisis->kategori) == 'Minor'   ? 'selected' : '' }}>Minor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <div class="section-header">
                                            <h5 class="section-title">
                                                <i class="fas fa-exclamation-triangle"></i>Analisis Risiko
                                            </h5>
                                            <button type="button" class="btn-ai-field"
                                                    onclick="generateTemplateAI('risiko', 'risiko', this)">
                                                <i class="fas fa-robot"></i> AI Generate
                                            </button>
                                        </div>
                                        <div class="mb-3">
                                            <label for="risiko" class="form-label">Risiko</label>
                                            <textarea name="risiko" id="risiko" class="form-control">{{ old('risiko', $analisis->risiko) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ═══════════ DAMPAK ═══════════ --}}
                            <div class="form-section">
                                <div class="section-header">
                                    <h5 class="section-title">
                                        <i class="fas fa-project-diagram"></i>Dampak Perubahan
                                    </h5>
                                    <button type="button" class="btn-ai-field"
                                            onclick="generateTemplateAI('dampak', 'dampak', this)">
                                        <i class="fas fa-robot"></i> AI Generate
                                    </button>
                                </div>
                                <div class="mb-3">
                                    <label for="dampak" class="form-label">Dampak</label>
                                    <textarea name="dampak" id="dampak" class="form-control">{{ old('dampak', $analisis->dampak) }}</textarea>
                                </div>
                            </div>

                            {{-- ═══════════ MITIGASI ═══════════ --}}
                            <div class="form-section">
                                <div class="section-header">
                                    <h5 class="section-title">
                                        <i class="fas fa-shield-alt"></i>Mitigasi Risiko
                                    </h5>
                                    <button type="button" class="btn-ai-field"
                                            onclick="generateTemplateAI('mitigasi', 'mitigasi', this)">
                                        <i class="fas fa-robot"></i> AI Generate
                                    </button>
                                </div>
                                <div class="mb-3">
                                    <label for="mitigasi" class="form-label">Mitigasi</label>
                                    <textarea name="mitigasi" id="mitigasi" class="form-control">{{ old('mitigasi', $analisis->mitigasi) }}</textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('dokumen.show', $dokuman) }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div class="ai-toast" id="ai-toast"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ── Config ────────────────────────────────────────────────────────────
        let temaSistem = "{{ $dokuman->judul ?? '' }}";

        // ── Toast ────────────────────────────────────────────────────────────
        let toastTimer;
        function showToast(msg, type = 'success') {
            clearTimeout(toastTimer);
            const t = document.getElementById('ai-toast');
            t.className = `ai-toast ${type} show`;
            t.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'clock' : 'exclamation-circle'}"></i> ${msg}`;
            toastTimer = setTimeout(() => t.classList.remove('show'), 5000);
        }

        // ── Core: Generate per-field (Plain Text) ──────────────────────────────
        async function generateTemplateAI(kategori, targetId, btnElement) {
            const originalText = btnElement.innerHTML;
            btnElement.innerHTML = '⏳ Menyusun Template...';
            btnElement.disabled = true;

            const textarea = document.getElementById(targetId);
            if(textarea) textarea.style.opacity = '0.5';

            try {
                const response = await fetch('{{ url("/ai/generate-template") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        kategori: kategori,
                        temaSistem: temaSistem
                    })
                });

                const text = await response.text();

                if (!response.ok) {
                    throw new Error(text || 'Gagal menghubungi server');
                }
                
                if(textarea) {
                    textarea.value = text;
                    textarea.classList.add('ai-filled');
                    setTimeout(() => textarea.classList.remove('ai-filled'), 2000);
                }
                showToast(`✨ Template "${kategori}" berhasil disusun!`, 'success');

            } catch (error) {
                console.error('Error:', error);
                showToast(error.message || 'Terjadi kesalahan saat menyusun template.', 'error');
            } finally {
                btnElement.innerHTML = originalText;
                btnElement.disabled = false;
                if(textarea) textarea.style.opacity = '1';
            }
        }

        // ── UX: hover card ───────────────────────────────────────────────────
        document.querySelectorAll('.form-control, .form-select').forEach(el => {
            el.addEventListener('focus', function() { this.parentElement.classList.add('focused'); });
            el.addEventListener('blur',  function() { this.parentElement.classList.remove('focused'); });
        });
    </script>
</body>
</html>