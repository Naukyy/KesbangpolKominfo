<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Rencana Pengembangan Perubahan</title>
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
            --text-light: #f8f9fa;
            --shadow: rgba(0, 180, 216, 0.15);
        }
        
        body {
            background: linear-gradient(135deg, var(--pastel-blue-lighter) 0%, var(--pastel-blue-light) 100%);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        
        /* Navbar Styles */
        .navbar-custom {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand i {
            margin-right: 10px;
            font-size: 1.8rem;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            color: white;
        }
        
        .user-name {
            margin-right: 15px;
            font-weight: 500;
        }
        
        .btn-logout {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            border-radius: 6px;
            padding: 0.4rem 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .btn-logout:hover {
            background: rgba(255, 255, 255, 0.3);
            color: white;
            transform: translateY(-2px);
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px var(--shadow);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 180, 216, 0.25);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            color: white;
            border-bottom: none;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card-header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 1.5rem;
        }
        
        .form-container {
            padding: 2rem;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }
        
        .form-control {
            border: 2px solid var(--pastel-blue);
            border-radius: 8px;
            padding: 0.75rem;
            transition: all 0.3s ease;
            background-color: white;
        }
        
        .form-control:focus {
            border-color: var(--neon-blue);
            box-shadow: 0 0 0 0.25rem rgba(0, 180, 216, 0.25);
        }
        
        .form-control:hover {
            border-color: var(--neon-blue-light);
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 180, 216, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 180, 216, 0.4);
            background: linear-gradient(135deg, var(--neon-blue-dark) 0%, var(--neon-blue) 100%);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #78909C, #90A4AE);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            background: linear-gradient(135deg, #90A4AE, #78909C);
        }
        
        .form-section {
            margin-bottom: 2rem;
            padding: 1.5rem;
            border-radius: 10px;
            background: var(--pastel-blue-lighter);
            border-left: 4px solid var(--neon-blue);
        }
        
        .form-section h5 {
            color: var(--neon-blue-dark);
            margin-bottom: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        
        .form-section h5 i {
            margin-right: 10px;
        }
        
        .phase-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }
        
        .phase-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            border-top: 4px solid var(--neon-blue);
            transition: all 0.3s ease;
        }
        
        .phase-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 180, 216, 0.15);
        }
        
        .phase-header {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--pastel-blue-light);
        }
        
        .phase-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: white;
        }
        
        .phase-title {
            font-weight: 600;
            color: var(--neon-blue-dark);
            margin: 0;
        }
        
        .header-glow {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }

        /* ── AI Generate Styles ─────────────────────────────────────── */
        .btn-ai {
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #ec4899 100%);
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            font-size: 0.85rem;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.4);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }
        .btn-ai:hover { transform: translateY(-2px) scale(1.03); box-shadow: 0 6px 20px rgba(124, 58, 237, 0.55); color: white; }
        .btn-ai:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
        .btn-ai .spinner-border { width: 0.9rem; height: 0.9rem; border-width: 2px; }

        .ai-overlay { display: none; position: fixed; inset: 0; background: rgba(15,10,35,0.65); backdrop-filter: blur(4px); z-index: 9999; align-items: center; justify-content: center; flex-direction: column; gap: 1rem; }
        .ai-overlay.active { display: flex; }
        .ai-overlay-card { background: linear-gradient(135deg, #1e1b4b, #312e81); border: 1px solid rgba(167,139,250,0.4); border-radius: 16px; padding: 2.5rem 3rem; text-align: center; color: white; box-shadow: 0 20px 60px rgba(0,0,0,0.5); }
        .ai-pulse { width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, #7c3aed, #ec4899); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.2rem; font-size: 1.8rem; animation: aiPulse 1.5s ease-in-out infinite; }
        @keyframes aiPulse { 0%, 100% { box-shadow: 0 0 0 0 rgba(124,58,237,0.6); transform: scale(1); } 50% { box-shadow: 0 0 0 15px rgba(124,58,237,0); transform: scale(1.05); } }
        .ai-overlay-title { font-size: 1.2rem; font-weight: 700; margin-bottom: 0.3rem; }
        .ai-overlay-sub { font-size: 0.85rem; opacity: 0.7; }
        .ai-toast { position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 10000; min-width: 300px; border-radius: 10px; padding: 1rem 1.25rem; color: white; font-weight: 500; display: flex; align-items: center; gap: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); opacity: 0; transition: opacity 0.3s; }
        .ai-toast.show { opacity: 1; }
        .ai-toast.success { background: linear-gradient(135deg, #059669, #10b981); }
        .ai-toast.error   { background: linear-gradient(135deg, #dc2626, #ef4444); }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .card-header h2 {
                margin-bottom: 1rem;
            }
            
            .user-info {
                flex-direction: column;
                align-items: flex-end;
            }
            
            .user-name {
                margin-right: 0;
                margin-bottom: 5px;
            }
            
            .phase-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar dengan user info dan logout -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-file-contract"></i>DocManager
            </a>
            
            <div class="user-info">
                <span class="user-name">
                    <i class="fas fa-user-circle me-1"></i>
                    <!-- Ganti dengan nama user yang sesungguhnya -->
                    {{ Auth::user()->name ?? 'Nama User' }}
                </span>
                <a href="{{ route('logout') }}" class="btn-logout" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                        <h2 class="header-glow"><i class="fas fa-code-branch me-2"></i>Edit Rencana Pengembangan Perubahan</h2>
                    </div>
                    <div class="form-container">
                        <form method="POST" action="{{ route('pengembangan.update', $dokuman) }}">
                            @csrf
                            @method('PUT')

                            <div class="phase-container">
                                <!-- Persiapan Phase -->
                                <div class="phase-card">
                                    <div class="phase-header" style="display:flex;align-items:center;justify-content:space-between;">
                                        <div style="display:flex;align-items:center;gap:10px;">
                                            <div class="phase-icon"><i class="fas fa-tools"></i></div>
                                            <h5 class="phase-title" style="margin:0;">Fase Persiapan</h5>
                                        </div>
                                        <button type="button" class="btn-ai-field"
                                                onclick="generateTemplateAI('persiapan_deskripsi', 'persiapan_deskripsi', this)">
                                            <i class="fas fa-robot"></i> AI Generate
                                        </button>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="persiapan_deskripsi" class="form-label">Deskripsi Persiapan</label>
                                        <textarea name="persiapan_deskripsi" id="persiapan_deskripsi" class="form-control" placeholder="Deskripsikan tahapan persiapan yang diperlukan...">{{ old('persiapan_deskripsi', $pengembangan->persiapan_deskripsi) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="persiapan_durasi" class="form-label">Durasi Persiapan</label>
                                        <input type="text" name="persiapan_durasi" id="persiapan_durasi" class="form-control" value="{{ old('persiapan_durasi', $pengembangan->persiapan_durasi) }}" placeholder="Contoh: 2 minggu, 30 hari, dll.">
                                    </div>
                                </div>

                                <!-- Pelaksanaan Phase -->
                                <div class="phase-card">
                                    <div class="phase-header" style="display:flex;align-items:center;justify-content:space-between;">
                                        <div style="display:flex;align-items:center;gap:10px;">
                                            <div class="phase-icon"><i class="fas fa-play-circle"></i></div>
                                            <h5 class="phase-title" style="margin:0;">Fase Pelaksanaan</h5>
                                        </div>
                                        <button type="button" class="btn-ai-field"
                                                onclick="generateTemplateAI('pelaksanaan_deskripsi', 'pelaksanaan_deskripsi', this)">
                                            <i class="fas fa-robot"></i> AI Generate
                                        </button>
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="pelaksanaan_deskripsi" class="form-label">Deskripsi Pelaksanaan</label>
                                        <textarea name="pelaksanaan_deskripsi" id="pelaksanaan_deskripsi" class="form-control" placeholder="Deskripsikan tahapan pelaksanaan perubahan...">{{ old('pelaksanaan_deskripsi', $pengembangan->pelaksanaan_deskripsi) }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pelaksanaan_durasi" class="form-label">Durasi Pelaksanaan</label>
                                        <input type="text" name="pelaksanaan_durasi" id="pelaksanaan_durasi" class="form-control" value="{{ old('pelaksanaan_durasi', $pengembangan->pelaksanaan_durasi) }}" placeholder="Contoh: 1 bulan, 45 hari, dll.">
                                    </div>
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
        // ── Tambahkan style btn-ai-field (inline agar tidak butuh edit CSS lama) ──
        const style = document.createElement('style');
        style.textContent = `
            .btn-ai-field {
                background: linear-gradient(135deg, var(--neon-blue), var(--neon-blue-dark));
                color: white; border: none; border-radius: 20px;
                padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 600;
                cursor: pointer; transition: all 0.25s ease;
                box-shadow: 0 2px 8px var(--shadow);
                display: inline-flex; align-items: center; gap: 4px;
                white-space: nowrap; flex-shrink: 0;
            }
            .btn-ai-field:hover:not(:disabled) {
                background: linear-gradient(135deg, var(--neon-blue-dark), #0077b6);
                transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,180,216,0.4);
                color: white;
            }
            .btn-ai-field:disabled { opacity: 0.65; cursor: not-allowed; transform: none; }
            .btn-ai-field .spin { animation: spin 0.8s linear infinite; display: inline-block; }
            @keyframes spin { to { transform: rotate(360deg); } }
            .ai-filled { border-color: var(--neon-blue) !important; background-color: var(--pastel-blue-lighter) !important; transition: all 0.4s ease !important; }
            .ai-toast {
                position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 10000;
                min-width: 280px; border-radius: 10px; padding: 0.85rem 1.2rem;
                color: white; font-weight: 500; font-size: 0.9rem;
                display: flex; align-items: center; gap: 10px;
                box-shadow: 0 8px 25px rgba(0,0,0,0.25); opacity: 0;
                transition: opacity 0.3s, transform 0.3s; transform: translateX(20px);
            }
            .ai-toast.show { opacity: 1; transform: translateX(0); }
            .ai-toast.success { background: linear-gradient(135deg, #059669, #10b981); }
            .ai-toast.error   { background: linear-gradient(135deg, #dc2626, #ef4444); }
            .ai-toast.warning { background: linear-gradient(135deg, #d97706, #f59e0b); }
        `;
        document.head.appendChild(style);

        // ── Config ────────────────────────────────────────────────────────────
        let temaSistem = "{{ $dokuman->judul ?? '' }}";

        // ── Toast ─────────────────────────────────────────────────────────────
        let toastTimer;
        function showToast(msg, type = 'success') {
            clearTimeout(toastTimer);
            const t = document.getElementById('ai-toast');
            t.className = `ai-toast ${type} show`;
            t.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : type === 'warning' ? 'clock' : 'exclamation-circle'}"></i> ${msg}`;
            toastTimer = setTimeout(() => t.classList.remove('show'), 5000);
        }

        // ── Core per-field generate ───────────────────────────────────────────
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

        // Phase card entrance animation
        document.querySelectorAll('.phase-card').forEach((card, i) => {
            card.style.opacity = '0'; card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease';
                card.style.opacity = '1'; card.style.transform = 'translateY(0)';
            }, i * 200);
        });
    </script>
</body>
</html>