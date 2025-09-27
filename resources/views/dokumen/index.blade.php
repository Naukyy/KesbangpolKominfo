<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Perubahan</title>
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
        
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table thead th {
            background: linear-gradient(135deg, var(--pastel-blue) 0%, var(--neon-blue-light) 100%);
            color: var(--text-dark);
            border: none;
            padding: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .table tbody tr {
            transition: all 0.3s ease;
        }
        
        .table tbody tr:hover {
            background-color: rgba(167, 199, 231, 0.2);
            transform: scale(1.01);
        }
        
        .table tbody td {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 180, 216, 0.1);
            vertical-align: middle;
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
        
        .btn-group .btn {
            border-radius: 6px;
            margin: 0 2px;
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-info {
            background: linear-gradient(135deg, #29B6F6, #4FC3F7);
            border: none;
            color: white;
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #FFA726, #FFB74D);
            border: none;
            color: white;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            border: none;
        }
        
        .btn-success {
            background: linear-gradient(135deg, #66BB6A, #81C784);
            border: none;
            color: white;
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #78909C, #90A4AE);
            border: none;
            color: white;
        }
        
        .btn-dark {
            background: linear-gradient(135deg, #455A64, #546E7A);
            border: none;
            color: white;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #EF5350, #E57373);
            border: none;
            color: white;
        }
        
        .btn-group .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        
        .alert-info {
            background: linear-gradient(135deg, var(--pastel-blue-light), var(--pastel-blue-lighter));
            border: none;
            border-radius: 10px;
            color: var(--text-dark);
            border-left: 4px solid var(--neon-blue);
        }
        
        .alert-info a {
            color: var(--neon-blue-dark);
            font-weight: 600;
            text-decoration: none;
        }
        
        .alert-info a:hover {
            text-decoration: underline;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--text-dark);
        }
        
        .empty-state i {
            font-size: 4rem;
            color: var(--pastel-blue);
            margin-bottom: 1rem;
        }
        
        .empty-state h3 {
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .header-glow {
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.7);
        }
        
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .card-header h4 {
                margin-bottom: 1rem;
            }
            
            .btn-group {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }
            
            .btn-group .btn {
                flex: 1;
                min-width: 80px;
                margin: 2px;
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
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-file-contract"></i>Kesbangpol
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-glow"><i class="fas fa-file-alt me-2"></i>Daftar Dokumen Perubahan</h4>
                        <a href="{{ route('dokumen.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus me-1"></i>Buat Dokumen Baru
                        </a>
                    </div>
                    <div class="card-body">
                        @if($dokumen->isEmpty())
                            <div class="empty-state">
                                <i class="fas fa-folder-open"></i>
                                <h3>Belum ada dokumen</h3>
                                <p>Mulai dengan membuat dokumen perubahan pertama Anda</p>
                                <a href="{{ route('dokumen.create') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-plus me-1"></i>Buat Dokumen Pertama
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No. Dokumen</th>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dokumen as $doc)
                                        <tr>
                                            <td><strong>{{ $doc->nomor_dokumen }}</strong></td>
                                            <td>{{ Str::limit($doc->judul, 50) }}</td>
                                            <td>{{ $doc->tanggal_dokumen->format('d/m/Y') }}</td>
                                            <td>
                                                @if($doc->pemantauanPerubahan && $doc->pemantauanPerubahan->status)
                                                    <span class="badge bg-{{ $doc->pemantauanPerubahan->status == 'Disetujui' ? 'success' : ($doc->pemantauanPerubahan->status == 'Ditunda' ? 'warning' : 'danger') }}">
                                                        {{ $doc->pemantauanPerubahan->status }}
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('dokumen.show', $doc) }}" class="btn btn-info btn-sm" title="Lihat">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('dokumen.edit', $doc) }}" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('analisis.edit', $doc) }}" class="btn btn-primary btn-sm" title="Analisis">
                                                        <i class="fas fa-chart-bar"></i>
                                                    </a>
                                                    <a href="{{ route('pengembangan.edit', $doc) }}" class="btn btn-success btn-sm" title="Pengembangan">
                                                        <i class="fas fa-code-branch"></i>
                                                    </a>
                                                    <a href="{{ route('pemantauan.edit', $doc) }}" class="btn btn-secondary btn-sm" title="Pemantauan">
                                                        <i class="fas fa-tasks"></i>
                                                    </a>
                                                    <a href="{{ route('dokumen.cetakPdf', $doc) }}" class="btn btn-dark btn-sm" target="_blank" id="btn-cetak-pdf-{{ $doc->id }}" title="PDF">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                    <form action="{{ route('dokumen.destroy', $doc) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus dokumen?')" title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('a[id^="btn-cetak-pdf-"]').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                window.open(this.href, '_blank');
            });
        });
        
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