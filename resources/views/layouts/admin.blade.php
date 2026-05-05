<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
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
        
        /* Sidebar */
.sidebar {
            height: 100vh;
            background: linear-gradient(180deg, var(--neon-blue-dark) 0%, var(--neon-blue) 100%);
            box-shadow: 2px 0 20px rgba(0, 180, 216, 0.2);
            transition: transform 0.3s ease;
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            z-index: 1000;
            overflow-y: auto;
        }
        
        .sidebar .sidebar-header {
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .sidebar .sidebar-brand {
            color: white;
            font-weight: 700;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
        }
        
        .sidebar .sidebar-brand i {
            margin-right: 10px;
            font-size: 1.6rem;
        }
        
        .sidebar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 1rem 1.5rem;
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .sidebar-nav .nav-link:hover,
        .sidebar-nav .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            border-left-color: var(--neon-blue-light);
        }
        
        /* Top Navbar */
.top-navbar {
            background: linear-gradient(135deg, var(--neon-blue) 0%, var(--neon-blue-dark) 100%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem 1.5rem;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1001;
            height: 70px;
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
        
        /* Main Content -->
.main-content {
            margin-left: 250px;
            margin-top: 70px;
            padding: 2rem;
            min-height: calc(100vh - 70px);
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
        }
        
        .table thead th {
            background: linear-gradient(135deg, var(--pastel-blue) 0%, var(--neon-blue-light) 100%);
            color: var(--text-dark);
            border: none;
            padding: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
        }
        
        .table tbody tr:hover {
            background-color: rgba(167, 199, 231, 0.2);
        }
        
        .btn-sm {
            border-radius: 6px;
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
        
        /* Responsive */
@media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .top-navbar {
                left: 0;
            }
            
            .main-content {
                margin-left: 0;
                margin-top: 70px;
            }
            
            body.sidebar-open {
                overflow: hidden;
            }
        }
        
        /* Mobile menu toggle */
        .menu-toggle {
            display: none;
        }
        
        @media (max-width: 992px) {
            .menu-toggle {
                display: block;
                color: white;
                background: none;
                border: none;
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="/admin/dashboard">
                <i class="fas fa-shield-alt"></i>
                Admin Panel
            </a>
        </div>
        <ul class="nav flex-column sidebar-nav mt-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="/admin/dashboard">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.pegawai.*') ? 'active' : '' }}" href="/admin/pegawai">
                    <i class="fas fa-users me-2"></i> Data Pegawai
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="/admin/users">
                    <i class="fas fa-user-cog me-2"></i> Akun Pengguna
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Top Navbar -->
    <nav class="top-navbar">
        <div class="container-fluid">
            <button class="menu-toggle me-3" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <div class="user-info ms-auto">
                <span class="user-name">
                    <i class="fas fa-user-circle me-1"></i>
                    {{ Auth::user()->name ?? 'Admin' }}
                </span>
                <a href="{{ route('logout') }}" class="btn-logout ms-2" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-1"></i>Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main class="main-content">
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
            if (sidebar.classList.contains('show')) {
                document.body.classList.add('sidebar-open');
            } else {
                document.body.classList.remove('sidebar-open');
            }
        }
        
        // Close sidebar on outside click (mobile)
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.menu-toggle');
            if (window.innerWidth <= 992 && !sidebar.contains(event.target) && !toggle.contains(event.target)) {
                sidebar.classList.remove('show');
                document.body.classList.remove('sidebar-open');
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
