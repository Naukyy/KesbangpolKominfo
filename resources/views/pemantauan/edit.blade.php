<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Pemantauan Perubahan</title>
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
        
        .form-control, .form-select {
            border: 2px solid var(--pastel-blue);
            border-radius: 8px;
            padding: 0.75rem;
            transition: all 0.3s ease;
            background-color: white;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--neon-blue);
            box-shadow: 0 0 0 0.25rem rgba(0, 180, 216, 0.25);
        }
        
        .form-control:hover, .form-select:hover {
            border-color: var(--neon-blue-light);
        }
        
        textarea.form-control {
            min-height: 100px;
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
        
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            margin-right: 5px;
        }
        
        .status-approved {
            background: linear-gradient(135deg, #4CAF50, #66BB6A);
            color: white;
        }
        
        .status-pending {
            background: linear-gradient(135deg, #FFA000, #FFB300);
            color: #333;
        }
        
        .status-rejected {
            background: linear-gradient(135deg, #F44336, #EF5350);
            color: white;
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

        .person-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
        }
        
        .person-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            border: 1px solid var(--pastel-blue);
            transition: all 0.3s ease;
        }
        
        .person-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .person-card h6 {
            color: var(--neon-blue-dark);
            font-weight: 600;
            margin-bottom: 1rem;
            border-bottom: 2px solid var(--pastel-blue);
            padding-bottom: 0.5rem;
        }
        
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
            
            .person-info-grid {
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="header-glow"><i class="fas fa-tasks me-2"></i>Edit Pemantauan Perubahan</h2>
                    </div>
                    <div class="form-container">
                        <form method="POST" action="{{ route('pemantauan.update', $dokuman) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h5><i class="fas fa-clipboard-check"></i>Status Pemantauan</h5>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" id="status" class="form-select">
                                                <option value="">- Pilih Status -</option>
                                                <option value="Disetujui" {{ old('status', $pemantauan->status) == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                <option value="Ditunda" {{ old('status', $pemantauan->status) == 'Ditunda' ? 'selected' : '' }}>Ditunda</option>
                                                <option value="Ditolak" {{ old('status', $pemantauan->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <label for="keterangan" class="form-label mb-0">Keterangan</label>
                                                <button type="button" class="btn-ai-field"
                                                        onclick="generateTemplateAI('keterangan', 'keterangan', this)">
                                                    <i class="fas fa-robot"></i> AI Generate
                                                </button>
                                            </div>
                                            <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan status...">{{ old('keterangan', $pemantauan->keterangan) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-section">
                                        <h5><i class="fas fa-user-check"></i>Penugasan</h5>
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <label for="penugasan" class="form-label mb-0">Penugasan</label>
                                                <button type="button" class="btn-ai-field"
                                                        onclick="generateTemplateAI('penugasan', 'penugasan', this)">
                                                    <i class="fas fa-robot"></i> AI Generate
                                                </button>
                                            </div>
                                            <textarea name="penugasan" id="penugasan" class="form-control" placeholder="Masukkan detail penugasan...">{{ old('penugasan', $pemantauan->penugasan) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5><i class="fas fa-user-tie"></i>Informasi Pengusul</h5>
                                <div class="person-info-grid">
                                    <div class="person-card">
                                        <h6><i class="fas fa-id-card me-2"></i>Jabatan</h6>
                                        <div class="mb-3">
                                            <label for="diusulkan_oleh_jabatan" class="form-label">Jabatan Pengusul</label>
                                            <input type="text" name="diusulkan_oleh_jabatan" id="diusulkan_oleh_jabatan" class="form-control" value="{{ old('diusulkan_oleh_jabatan', $pemantauan->diusulkan_oleh_jabatan) }}" placeholder="Masukkan jabatan pengusul">
                                        </div>
                                    </div>
                                    <div class="person-card">
                                        <h6><i class="fas fa-user me-2"></i>Nama</h6>
                                        <div class="mb-3">
                                            <label for="diusulkan_oleh_nama" class="form-label">Nama Pengusul</label>
                                            <input type="text" name="diusulkan_oleh_nama" id="diusulkan_oleh_nama" class="form-control" value="{{ old('diusulkan_oleh_nama', $pemantauan->diusulkan_oleh_nama) }}" placeholder="Masukkan nama pengusul">
                                        </div>
                                    </div>
                                    <div class="person-card">
                                        <h6><i class="fas fa-fingerprint me-2"></i>NIP</h6>
                                        <div class="mb-3">
                                            <label for="diusulkan_oleh_nip" class="form-label">NIP Pengusul</label>
                                            <input type="text" name="diusulkan_oleh_nip" id="diusulkan_oleh_nip" class="form-control" value="{{ old('diusulkan_oleh_nip', $pemantauan->diusulkan_oleh_nip) }}" placeholder="Masukkan NIP pengusul">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-section">
                                <h5><i class="fas fa-user-shield"></i>Informasi Penyetuju</h5>
                                <div class="person-info-grid">
                                    <div class="person-card">
                                        <h6><i class="fas fa-id-card me-2"></i>Jabatan</h6>
                                        <div class="mb-3">
                                            <label for="disetujui_oleh_jabatan" class="form-label">Jabatan Penyetuju</label>
                                            <input type="text" name="disetujui_oleh_jabatan" id="disetujui_oleh_jabatan" class="form-control" value="{{ old('disetujui_oleh_jabatan', $pemantauan->disetujui_oleh_jabatan) }}" placeholder="Masukkan jabatan penyetuju">
                                        </div>
                                    </div>
                                    <div class="person-card">
                                        <h6><i class="fas fa-user me-2"></i>Nama</h6>
                                        <div class="mb-3">
                                            <label for="disetujui_oleh_nama" class="form-label">Nama Penyetuju</label>
                                            <input type="text" name="disetujui_oleh_nama" id="disetujui_oleh_nama" class="form-control" value="{{ old('disetujui_oleh_nama', $pemantauan->disetujui_oleh_nama) }}" placeholder="Masukkan nama penyetuju">
                                        </div>
                                    </div>
                                    <div class="person-card">
                                        <h6><i class="fas fa-fingerprint me-2"></i>NIP</h6>
                                        <div class="mb-3">
                                            <label for="disetujui_oleh_nip" class="form-label">NIP Penyetuju</label>
                                            <input type="text" name="disetujui_oleh_nip" id="disetujui_oleh_nip" class="form-control" value="{{ old('disetujui_oleh_nip', $pemantauan->disetujui_oleh_nip) }}" placeholder="Masukkan NIP penyetuju">
                                        </div>
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

    <!-- AI Loading Overlay -->
    <div class="ai-overlay" id="ai-overlay">
        <div class="ai-overlay-card">
            <div class="ai-pulse">✨</div>
            <div class="ai-overlay-title" id="ai-overlay-title">AI sedang menyusun pemantauan...</div>
            <div class="ai-overlay-sub" id="ai-overlay-sub">Mengidentifikasi metrics dan KPI yang relevan</div>
        </div>
    </div>
    <div class="ai-toast" id="ai-toast"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() { this.style.transform = 'translateY(-5px)'; });
            card.addEventListener('mouseleave', function() { this.style.transform = 'translateY(0)'; });
        });
        document.querySelectorAll('.form-control, .form-select').forEach(field => {
            field.addEventListener('focus',  function() { this.parentElement.classList.add('focused'); });
            field.addEventListener('blur',   function() { this.parentElement.classList.remove('focused'); });
        });

        // Status badge (existing logic)
        const statusSelect = document.getElementById('status');
        const statusIndicator = document.createElement('div');
        statusIndicator.className = 'mt-2';
        statusSelect.parentNode.appendChild(statusIndicator);
        function updateStatusIndicator() {
            const value = statusSelect.value;
            let badgeClass = '', badgeText = '';
            switch(value) {
                case 'Disetujui': badgeClass = 'status-approved'; badgeText = 'Status: Disetujui'; break;
                case 'Ditunda':   badgeClass = 'status-pending';  badgeText = 'Status: Ditunda';   break;
                case 'Ditolak':   badgeClass = 'status-rejected'; badgeText = 'Status: Ditolak';   break;
                default: badgeClass = ''; badgeText = '';
            }
            statusIndicator.innerHTML = badgeText ? `<span class="status-badge ${badgeClass}">${badgeText}</span>` : '';
        }
        statusSelect.addEventListener('change', updateStatusIndicator);
        updateStatusIndicator();

        // ── Tambahkan style btn-ai-field ──
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
            .ai-filled { border-color: var(--neon-blue) !important; background-color: var(--pastel-blue-lighter) !important; transition: all 0.4s ease !important; }
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
    </script>
</body>
</html>