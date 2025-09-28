<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Dokumen Perubahan Baru</title>
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
        }
        
        .card-header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .card-header h4 i {
            margin-right: 10px;
        }
        
        .card-body {
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
        }
        
        .form-control:focus {
            border-color: var(--neon-blue);
            box-shadow: 0 0 0 0.2rem rgba(0, 180, 216, 0.25);
        }
        
        .form-check {
            margin-bottom: 0.5rem;
        }
        
        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-right: 0.5rem;
            border: 2px solid var(--pastel-blue);
        }
        
        .form-check-input:checked {
            background-color: var(--neon-blue);
            border-color: var(--neon-blue);
        }
        
        .form-check-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 180, 216, 0.25);
        }
        
        .form-check-label {
            color: var(--text-dark);
            font-weight: 500;
        }
        
        .checkbox-group {
            background: rgba(167, 199, 231, 0.1);
            border-radius: 10px;
            padding: 1.5rem;
            border: 1px solid var(--pastel-blue);
        }
        
        .checkbox-group .row {
            margin-bottom: 0.5rem;
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
        }
        
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(120, 144, 156, 0.3);
        }
        
        .required-field::after {
            content: " *";
            color: #e74c3c;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }
            
            .checkbox-group {
                padding: 1rem;
            }
            
            .user-info {
                flex-direction: column;
                align-items: flex-end;
            }
            
            .user-name {
                margin-right: 0;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar dengan user info dan logout -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dokumen.index') }}">
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
                        <h4 class="header-glow"><i class="fas fa-plus-circle me-2"></i>Buat Dokumen Perubahan Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dokumen.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nomor_dokumen" class="form-label required-field">Nomor Dokumen</label>
                                        <input type="text" class="form-control" id="nomor_dokumen" name="nomor_dokumen" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="tanggal_dokumen" class="form-label required-field">Tanggal Dokumen</label>
                                        <input type="date" class="form-control" id="tanggal_dokumen" name="tanggal_dokumen" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="judul" class="form-label required-field">Judul Perubahan</label>
                                <textarea class="form-control" id="judul" name="judul" rows="3" required></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label required-field">Lingkup Perubahan</label>
                                <div class="checkbox-group">
                                    <div class="row mb-2">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Kebijakan" id="kebijakan">
                                                <label class="form-check-label" for="kebijakan">Kebijakan</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Prosedur" id="prosedur">
                                                <label class="form-check-label" for="prosedur">Prosedur</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Struktur Organisasi" id="struktur">
                                                <label class="form-check-label" for="struktur">Struktur Organisasi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Sistem Teknologi" id="teknologi">
                                                <label class="form-check-label" for="teknologi">Sistem Teknologi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Sumber Daya Manusia" id="sdm">
                                                <label class="form-check-label" for="sdm">Sumber Daya Manusia</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Proses Bisnis" id="proses_bisnis">
                                                <label class="form-check-label" for="proses_bisnis">Proses Bisnis</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Aplikasi" id="aplikasi">
                                                <label class="form-check-label" for="aplikasi">Aplikasi</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Infrastruktur" id="infrastruktur">
                                                <label class="form-check-label" for="infrastruktur">Infrastruktur</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Lingkungan Organisasi" id="lingkungan_organisasi">
                                                <label class="form-check-label" for="lingkungan_organisasi">Lingkungan Organisasi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Data" id="data">
                                                <label class="form-check-label" for="data">Data</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Perangkat Lunak" id="perangkat_lunak">
                                                <label class="form-check-label" for="perangkat_lunak">Perangkat Lunak</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Perangkat Keras" id="perangkat_keras">
                                                <label class="form-check-label" for="perangkat_keras">Perangkat Keras</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Layanan" id="layanan">
                                                <label class="form-check-label" for="layanan">Layanan</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Keamanan" id="keamanan">
                                                <label class="form-check-label" for="keamanan">Keamanan</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lingkup_perubahan[]" value="Arsitektur" id="arsitektur">
                                                <label class="form-check-label" for="arsitektur">Arsitektur</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="penyusun" class="form-label required-field">Penyusun</label>
                                        <input type="text" class="form-control" id="penyusun" name="penyusun" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="target_penyelesaian" class="form-label required-field">Target Penyelesaian</label>
                                        <input type="date" class="form-control" id="target_penyelesaian" name="target_penyelesaian" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="lokasi" class="form-label required-field">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <a href="{{ route('dokumen.index') }}" class="btn btn-secondary me-md-2">
                                    <i class="fas fa-arrow-left me-1"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Simpan Dokumen
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tambahkan efek hover pada card
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>