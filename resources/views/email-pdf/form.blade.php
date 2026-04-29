<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Dokumen PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --pastel-blue: #a7c7e7;
            --pastel-blue-light: #d4e4f7;
            --pastel-blue-lighter: #e8f0fe;
            --neon-blue: #00b4d8;
            --neon-blue-dark: #0096c7;
            --text-dark: #2c3e50;
        }
        
        body {
            background: linear-gradient(135deg, var(--pastel-blue-lighter) 0%, var(--pastel-blue-light) 100%);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 180, 216, 0.15);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .card-header {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 1.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            border: none;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            border-radius: 8px;
        }

        /* Loading Overlay Style */
        #loading-overlay {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(255, 255, 255, 0.85);
            z-index: 9999;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(5px);
        }

        .spinner-border {
            width: 4rem; height: 4rem;
            color: var(--neon-blue);
        }
    </style>
</head>
<body>

    <div id="loading-overlay">
        <div class="spinner-border mb-3" role="status"></div>
        <h4 style="color: var(--neon-blue-dark); font-weight: 600;">Mengirim Email...</h4>
        <p class="text-muted">Mohon tunggu sebentar, sedang memproses file PDF Anda.</p>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="fas fa-paper-plane me-2"></i>Kirim Dokumen via Email</h4>
                        <a href="{{ route('dokumen.index') }}" class="btn btn-sm btn-light text-dark">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('email.pdf.send') }}" method="POST" enctype="multipart/form-data" id="emailForm">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="email_tujuan" class="form-label fw-bold">Alamat Email Tujuan</label>
                                <input type="email" class="form-control @error('email_tujuan') is-invalid @enderror" id="email_tujuan" name="email_tujuan" placeholder="contoh: client@email.com" value="{{ old('email_tujuan') }}" required>
                                @error('email_tujuan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="file_pdf" class="form-label fw-bold">Upload File PDF</label>
                                <input class="form-control @error('file_pdf') is-invalid @enderror" type="file" id="file_pdf" name="file_pdf" accept=".pdf" required>
                                <div class="form-text">Pastikan file berformat .pdf (Maksimal 10MB).</div>
                                @error('file_pdf') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="keterangan" class="form-label fw-bold">Keterangan / Pesan (Opsional)</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" placeholder="Tuliskan pesan yang akan disematkan di badan email...">{{ old('keterangan') }}</textarea>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary" id="btnSubmit">
                                    <i class="fas fa-paper-plane me-1"></i> Kirim Email Sekarang
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
        // Script untuk menampilkan loading overlay saat form disubmit
        document.getElementById('emailForm').addEventListener('submit', function(e) {
            // Hanya jalankan loading jika input valid (HTML5 validation lolos)
            if (this.checkValidity()) {
                document.getElementById('loading-overlay').style.display = 'flex';
                document.getElementById('btnSubmit').disabled = true;
            }
        });
    </script>
</body>
</html>