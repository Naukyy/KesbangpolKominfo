<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - DocManager</title>
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
            --shadow-dark: rgba(0, 180, 216, 0.3);
        }

        body {
            background: linear-gradient(135deg, var(--pastel-blue-lighter) 0%, var(--pastel-blue-light) 100%);
            color: var(--text-dark);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .verify-container {
            width: 100%;
            max-width: 500px;
        }

        .verify-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px var(--shadow-dark);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .verify-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px var(--shadow-dark);
        }

        .card-header {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            color: white;
            border-bottom: none;
            padding: 2rem 2rem 1.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .card-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 6s infinite linear;
        }

        @keyframes pulse {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .card-header h3 {
            margin: 0;
            font-weight: 700;
            font-size: 1.8rem;
            position: relative;
            z-index: 1;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-header p {
            margin: 0.5rem 0 0;
            opacity: 0.9;
            font-size: 0.95rem;
            position: relative;
            z-index: 1;
        }

        .card-body {
            padding: 2rem;
        }

        .verify-icon {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .verify-icon i {
            font-size: 4rem;
            color: var(--neon-blue);
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            border: none;
            border-radius: 10px;
            color: #155724;
            border-left: 4px solid #28a745;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .verify-text {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .btn-resend {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .btn-resend::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }

        .btn-resend:hover::before {
            left: 100%;
        }

        .btn-resend:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px var(--shadow-dark);
        }

        .btn-resend:active {
            transform: translateY(0);
        }

        .back-to-login {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-to-login a {
            color: var(--neon-blue-dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .back-to-login a:hover {
            color: var(--neon-blue);
            text-decoration: underline;
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            background: rgba(167, 199, 231, 0.3);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 10%;
            animation-duration: 20s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            left: 80%;
            animation-duration: 25s;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 20%;
            animation-duration: 18s;
            animation-delay: 4s;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(20px, 30px) rotate(90deg);
            }
            50% {
                transform: translate(0, 60px) rotate(180deg);
            }
            75% {
                transform: translate(-20px, 30px) rotate(270deg);
            }
            100% {
                transform: translate(0, 0) rotate(360deg);
            }
        }

        @media (max-width: 576px) {
            .verify-container {
                max-width: 100%;
            }

            .card-body {
                padding: 1.5rem;
            }

            .card-header {
                padding: 1.5rem 1.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="verify-container">
        <div class="verify-card">
            <div class="card-header">
                <h3><i class="fas fa-envelope me-2"></i>Verifikasi Email</h3>
                <p>Aktivasi akun DocManager Anda</p>
            </div>

            <div class="card-body">
                <div class="verify-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>

                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        Link verifikasi baru telah dikirim ke alamat email Anda.
                    </div>
                @endif

                <div class="verify-text">
                    <p>Sebelum melanjutkan, silakan periksa email Anda untuk link verifikasi.</p>
                    <p>Jika Anda tidak menerima email tersebut,</p>
                </div>

                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn-resend">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Ulang Link Verifikasi
                    </button>
                </form>

                <div class="back-to-login">
                    <a href="{{ route('login') }}">
                        <i class="fas fa-arrow-left me-1"></i>Kembali ke halaman login
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
