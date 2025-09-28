<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokumen Perubahan</title>
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
        
        .card-header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 1.5rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 180, 216, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 180, 216, 0.4);
            background: linear-gradient(135deg, var(--neon-blue-dark) 0%, var(--neon-blue) 100%);
        }
        
        .btn-dark {
            background: linear-gradient(135deg, #455A64, #546E7A);
            border: none;
            color: white;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #78909C, #90A4AE);
            border: none;
            color: white;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #66BB6A, #81C784);
            border: none;
            color: white;
        }
        
        .section-header {
            background: linear-gradient(135deg, var(--pastel-blue) 0%, var(--neon-blue-light) 100%);
            color: var(--text-dark);
            padding: 1rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-weight: 600;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        
        .section-header i {
            margin-right: 10px;
            font-size: 1.3rem;
        }
        
        .info-card {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid var(--neon-blue);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }
        
        .info-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }
        
        .info-item {
            margin-bottom: 0.8rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid rgba(0, 180, 216, 0.1);
        }
        
        .info-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: var(--neon-blue-dark);
            margin-bottom: 0.3rem;
        }
        
        .info-value {
            color: var(--text-dark);
        }
        
        .badge {
            padding: 0.5rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        
        .badge.bg-success {
            background: linear-gradient(135deg, #4CAF50, #66BB6A) !important;
        }
        
        .badge.bg-warning {
            background: linear-gradient(135deg, #FFA000, #FFB300) !important;
            color: #333;
        }
        
        .badge.bg-danger {
            background: linear-gradient(135deg, #F44336, #EF5350) !important;
        }
        
        .badge.bg-secondary {
            background: linear-gradient(135deg, #78909C, #90A4AE) !important;
        }
        
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--text-dark);
            background: rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            border: 2px dashed var(--pastel-blue);
        }
        
        .empty-state i {
            font-size: 3rem;
            color: var(--pastel-blue);
            margin-bottom: 1rem;
        }
        
        .sub-section {
            margin-bottom: 1.5rem;
        }
        
        .sub-section h6 {
            color: var(--neon-blue-dark);
            font-weight: 600;
            margin-bottom: 0.8rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(0, 180, 216, 0.2);
        }
        
        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-end;
            margin-top: 2rem;
        }
        
        .action-buttons .btn {
            border-radius: 8px;
            padding: 0.6rem 1.2rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .action-buttons .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .card-header h4 {
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
            
            .action-buttons {
                justify-content: center;
            }
            
            .action-buttons .btn {
                flex: 1;
                min-width: 150px;
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-glow">
                            <i class="fas fa-file-alt me-2"></i>Dokumen Perubahan: {{ $dokumen->nomor_dokumen }}
                        </h4>
                        <div class="btn-group">
                            <a href="{{ route('dokumen.cetakPdf', $dokumen) }}" class="btn btn-dark btn-sm" target="_blank" id="btn-cetak-pdf">
                                <i class="fas fa-file-pdf me-1"></i>Cetak PDF
                            </a>
                            <a href="{{ route('dokumen.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left me-1"></i>Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <!-- Informasi Rencana Perubahan -->
                        <div class="mb-5">
                            <div class="section-header">
                                <i class="fas fa-info-circle"></i>I. INFORMASI RENCANA PERUBAHAN
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="info-item">
                                            <div class="info-label">Nomor Dokumen</div>
                                            <div class="info-value">{{ $dokumen->nomor_dokumen }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Tanggal</div>
                                            <div class="info-value">{{ $dokumen->tanggal_dokumen->format('d/m/Y') }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Judul</div>
                                            <div class="info-value">{{ $dokumen->judul }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="info-item">
                                            <div class="info-label">Lingkup Perubahan</div>
                                            <div class="info-value">{{ implode(', ', $dokumen->lingkup_perubahan) }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Penyusun</div>
                                            <div class="info-value">{{ $dokumen->penyusun }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Target Penyelesaian</div>
                                            <div class="info-value">{{ $dokumen->target_penyelesaian->format('d/m/Y') }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Lokasi</div>
                                            <div class="info-value">{{ $dokumen->lokasi }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Analisis Perubahan -->
                        <div class="mb-5">
                            <div class="section-header">
                                <i class="fas fa-chart-bar"></i>II. ANALISIS PERUBAHAN
                            </div>
                            @if($dokumen->analisisPerubahan)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="info-item">
                                            <div class="info-label">Deskripsi</div>
                                            <div class="info-value">{{ $dokumen->analisisPerubahan->deskripsi }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Prioritas</div>
                                            <div class="info-value">{{ $dokumen->analisisPerubahan->prioritas }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Kategori</div>
                                            <div class="info-value">{{ $dokumen->analisisPerubahan->kategori }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="info-item">
                                            <div class="info-label">Risiko</div>
                                            <div class="info-value">{{ $dokumen->analisisPerubahan->risiko ?? '-' }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Dampak</div>
                                            <div class="info-value">{{ $dokumen->analisisPerubahan->dampak ?? '-' }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Mitigasi</div>
                                            <div class="info-value">{{ $dokumen->analisisPerubahan->mitigasi ?? '-' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="empty-state">
                                <i class="fas fa-chart-line"></i>
                                <h5>Belum ada data analisis perubahan</h5>
                                <p>Tambahkan analisis perubahan untuk melengkapi dokumen ini</p>
                            </div>
                            @endif
                        </div>

                        <!-- Rencana Pengembangan -->
                        <div class="mb-5">
                            <div class="section-header">
                                <i class="fas fa-code-branch"></i>III. RENCANA PENGEMBANGAN PERUBAHAN
                            </div>
                            @if($dokumen->rencanaPengembanganPerubahan)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="sub-section">
                                            <h6><i class="fas fa-tools me-1"></i>Persiapan</h6>
                                            <div class="info-item">
                                                <div class="info-label">Deskripsi</div>
                                                <div class="info-value">{{ $dokumen->rencanaPengembanganPerubahan->persiapan_deskripsi ?? '-' }}</div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-label">Durasi</div>
                                                <div class="info-value">{{ $dokumen->rencanaPengembanganPerubahan->persiapan_durasi ?? '-' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="sub-section">
                                            <h6><i class="fas fa-play-circle me-1"></i>Pelaksanaan</h6>
                                            <div class="info-item">
                                                <div class="info-label">Deskripsi</div>
                                                <div class="info-value">{{ $dokumen->rencanaPengembanganPerubahan->pelaksanaan_deskripsi ?? '-' }}</div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-label">Durasi</div>
                                                <div class="info-value">{{ $dokumen->rencanaPengembanganPerubahan->pelaksanaan_durasi ?? '-' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="empty-state">
                                <i class="fas fa-project-diagram"></i>
                                <h5>Belum ada data rencana pengembangan</h5>
                                <p>Tambahkan rencana pengembangan untuk melengkapi dokumen ini</p>
                            </div>
                            @endif
                        </div>

                        <!-- Pemantauan Perubahan -->
                        <div class="mb-4">
                            <div class="section-header">
                                <i class="fas fa-tasks"></i>IV. PEMANTAUAN PERUBAHAN
                            </div>
                            @if($dokumen->pemantauanPerubahan)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="info-item">
                                            <div class="info-label">Status</div>
                                            <div class="info-value">
                                                @if($dokumen->pemantauanPerubahan->status)
                                                    <span class="badge bg-{{ $dokumen->pemantauanPerubahan->status == 'Disetujui' ? 'success' : ($dokumen->pemantauanPerubahan->status == 'Ditunda' ? 'warning' : 'danger') }}">
                                                        {{ $dokumen->pemantauanPerubahan->status }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">Draft</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Keterangan</div>
                                            <div class="info-value">{{ $dokumen->pemantauanPerubahan->keterangan ?? '-' }}</div>
                                        </div>
                                        <div class="info-item">
                                            <div class="info-label">Penugasan</div>
                                            <div class="info-value">{{ $dokumen->pemantauanPerubahan->penugasan ?? '-' }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-card">
                                        <div class="sub-section">
                                            <h6><i class="fas fa-user-check me-1"></i>Diusulkan Oleh</h6>
                                            <div class="info-item">
                                                <div class="info-label">Nama</div>
                                                <div class="info-value">{{ $dokumen->pemantauanPerubahan->diusulkan_oleh_nama ?? '-' }}</div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-label">Jabatan</div>
                                                <div class="info-value">{{ $dokumen->pemantauanPerubahan->diusulkan_oleh_jabatan ?? '-' }}</div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-label">NIP</div>
                                                <div class="info-value">{{ $dokumen->pemantauanPerubahan->diusulkan_oleh_nip ?? '-' }}</div>
                                            </div>
                                        </div>
                                        
                                        <div class="sub-section">
                                            <h6><i class="fas fa-user-shield me-1"></i>Disetujui Oleh</h6>
                                            <div class="info-item">
                                                <div class="info-label">Nama</div>
                                                <div class="info-value">{{ $dokumen->pemantauanPerubahan->disetujui_oleh_nama ?? '-' }}</div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-label">Jabatan</div>
                                                <div class="info-value">{{ $dokumen->pemantauanPerubahan->disetujui_oleh_jabatan ?? '-' }}</div>
                                            </div>
                                            <div class="info-item">
                                                <div class="info-label">NIP</div>
                                                <div class="info-value">{{ $dokumen->pemantauanPerubahan->disetujui_oleh_nip ?? '-' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="empty-state">
                                <i class="fas fa-clipboard-check"></i>
                                <h5>Belum ada data pemantauan perubahan</h5>
                                <p>Tambahkan data pemantauan untuk melengkapi dokumen ini</p>
                            </div>
                            @endif
                        </div>

                        <div class="action-buttons">
                            <a href="{{ route('analisis.edit', $dokumen) }}" class="btn btn-primary">
                                <i class="fas fa-edit me-1"></i>Edit Analisis
                            </a>
                            <a href="{{ route('pengembangan.edit', $dokumen) }}" class="btn btn-success">
                                <i class="fas fa-edit me-1"></i>Edit Pengembangan
                            </a>
                            <a href="{{ route('pemantauan.edit', $dokumen) }}" class="btn btn-secondary">
                                <i class="fas fa-edit me-1"></i>Edit Pemantauan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('btn-cetak-pdf').addEventListener('click', function(e) {
            e.preventDefault();
            window.open(this.href, '_blank');
        });
        
        // Tambahkan efek hover pada card
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
        
        // Tambahkan efek hover pada info-card
        document.querySelectorAll('.info-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>