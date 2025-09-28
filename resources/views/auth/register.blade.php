<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - DocManager</title>
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
        
        .register-container {
            width: 100%;
            max-width: 480px;
        }
        
        .register-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px var(--shadow-dark);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        
        .register-card:hover {
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
        
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
            display: flex;
            align-items: center;
        }
        
        .form-label i {
            margin-right: 8px;
            color: var(--neon-blue);
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }
        
        .form-control {
            border: 2px solid var(--pastel-blue);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.8);
        }
        
        .form-control:focus {
            border-color: var(--neon-blue);
            box-shadow: 0 0 0 0.25rem rgba(0, 180, 216, 0.25);
            background-color: white;
        }
        
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        
        .invalid-feedback {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #dc3545;
            font-weight: 500;
        }
        
        .password-strength {
            margin-top: 0.5rem;
            font-size: 0.8rem;
        }
        
        .strength-bar {
            height: 4px;
            background-color: #e9ecef;
            border-radius: 2px;
            margin-top: 5px;
            overflow: hidden;
        }
        
        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        
        .strength-weak {
            background-color: #dc3545;
            width: 25%;
        }
        
        .strength-medium {
            background-color: #ffc107;
            width: 50%;
        }
        
        .strength-strong {
            background-color: #28a745;
            width: 75%;
        }
        
        .strength-very-strong {
            background-color: #20c997;
            width: 100%;
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px var(--shadow);
            position: relative;
            overflow: hidden;
        }
        
        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-register:hover::before {
            left: 100%;
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px var(--shadow-dark);
        }
        
        .btn-register:active {
            transform: translateY(0);
        }
        
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--pastel-blue);
        }
        
        .login-link a {
            color: var(--neon-blue-dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            display: inline-flex;
            align-items: center;
        }
        
        .login-link a i {
            margin-right: 5px;
        }
        
        .login-link a:hover {
            color: var(--neon-blue);
            text-decoration: underline;
        }
        
        .register-decoration {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .register-decoration i {
            font-size: 3rem;
            color: var(--neon-blue);
            margin-bottom: 0.5rem;
            text-shadow: 0 0 10px rgba(0, 180, 216, 0.3);
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
        
        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 30%;
            left: 85%;
            animation-duration: 22s;
            animation-delay: 1s;
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
        
        .terms-text {
            font-size: 0.85rem;
            color: #6c757d;
            text-align: center;
            margin-top: 1rem;
        }
        
        .terms-text a {
            color: var(--neon-blue);
            text-decoration: none;
        }
        
        .terms-text a:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 576px) {
            .register-container {
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
        <div class="shape"></div>
    </div>
    
    <div class="register-container">
        <div class="register-card">
            <div class="card-header">
                <h3><i class="fas fa-user-plus me-2"></i>Buat Akun Baru</h3>
                <p>Bergabung dengan DocManager</p>
            </div>
            
            <div class="card-body">
                <div class="register-decoration">
                    <i class="fas fa-file-contract"></i>
                </div>
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name" class="form-label">
                            <i class="fas fa-user"></i>{{ __('Nama Lengkap') }}
                        </label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                               placeholder="Masukkan nama lengkap Anda">
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i>{{ __('Email Address') }}
                        </label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email"
                               placeholder="Masukkan alamat email Anda">
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-key"></i>{{ __('Password') }}
                        </label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="new-password"
                               placeholder="Buat kata sandi yang kuat">
                        
                        <div class="password-strength">
                            <div class="strength-text"></div>
                            <div class="strength-bar">
                                <div class="strength-fill" id="password-strength"></div>
                            </div>
                        </div>
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong><i class="fas fa-exclamation-circle me-1"></i>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password-confirm" class="form-label">
                            <i class="fas fa-key"></i>{{ __('Confirm Password') }}
                        </label>
                        <input id="password-confirm" type="password" class="form-control" 
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="Konfirmasi kata sandi Anda">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn-register">
                            <i class="fas fa-user-plus me-2"></i>{{ __('Daftar Sekarang') }}
                        </button>
                    </div>
                    
                    <div class="terms-text">
                        Dengan mendaftar, Anda menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a> kami.
                    </div>
                    
                    <div class="login-link">
                        Sudah punya akun? <a href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i>{{ __('Login di sini') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strengthBar = document.getElementById('password-strength');
            const strengthText = document.querySelector('.strength-text');
            
            // Reset classes
            strengthBar.className = 'strength-fill';
            
            if (password.length === 0) {
                strengthBar.style.width = '0%';
                strengthText.textContent = '';
                return;
            }
            
            // Calculate strength
            let strength = 0;
            
            // Length check
            if (password.length >= 8) strength += 25;
            
            // Lowercase and uppercase check
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 25;
            
            // Number check
            if (/[0-9]/.test(password)) strength += 25;
            
            // Special character check
            if (/[^A-Za-z0-9]/.test(password)) strength += 25;
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            
            // Update strength class and text
            if (strength <= 25) {
                strengthBar.classList.add('strength-weak');
                strengthText.textContent = 'Kata sandi lemah';
                strengthText.style.color = '#dc3545';
            } else if (strength <= 50) {
                strengthBar.classList.add('strength-medium');
                strengthText.textContent = 'Kata sandi cukup';
                strengthText.style.color = '#ffc107';
            } else if (strength <= 75) {
                strengthBar.classList.add('strength-strong');
                strengthText.textContent = 'Kata sandi kuat';
                strengthText.style.color = '#28a745';
            } else {
                strengthBar.classList.add('strength-very-strong');
                strengthText.textContent = 'Kata sandi sangat kuat';
                strengthText.style.color = '#20c997';
            }
        });
        
        // Password confirmation check
        document.getElementById('password-confirm').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (confirmPassword && password !== confirmPassword) {
                this.style.borderColor = '#dc3545';
            } else {
                this.style.borderColor = password ? '#28a745' : '#a7c7e7';
            }
        });
        
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password-confirm').value;
            
            if (!name || !email || !password || !confirmPassword) {
                e.preventDefault();
                alert('Harap isi semua field yang diperlukan.');
                return;
            }
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Konfirmasi kata sandi tidak sesuai.');
                return;
            }
        });
        
        // Efek animasi pada input saat fokus
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
    </script>
</body>
</html>