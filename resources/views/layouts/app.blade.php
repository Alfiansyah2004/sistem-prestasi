<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Prestasi Siswa - MA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #f0f4f8; font-family: 'Segoe UI', sans-serif; }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(160deg, #0f4c35 0%, #1a7a50 60%, #25a96e 100%);
            position: fixed;
            top: 0; left: 0;
            box-shadow: 4px 0 15px rgba(0,0,0,0.15);
            z-index: 100;
            display: flex;
            flex-direction: column;
        }
        .sidebar-brand {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }
        .sidebar-brand h5 {
            color: white;
            font-weight: 700;
            font-size: 1rem;
            margin: 0;
            line-height: 1.4;
        }
        .sidebar-brand small { color: rgba(255,255,255,0.6); font-size: 0.75rem; }
        .sidebar-brand .brand-icon {
            width: 45px; height: 45px;
            background: rgba(255,255,255,0.2);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; color: white;
            margin-bottom: 10px;
        }
        .sidebar nav { padding: 15px 12px; flex: 1; }
        .nav-label {
            color: rgba(255,255,255,0.4);
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 10px 10px 5px;
        }
        .nav-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 10px;
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
            margin-bottom: 3px;
        }
        .nav-item a:hover { background: rgba(255,255,255,0.15); color: white; }
        .nav-item a.active {
            background: rgba(255,255,255,0.22);
            color: white; font-weight: 600;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        .nav-item a .nav-icon {
            width: 32px; height: 32px;
            background: rgba(255,255,255,0.12);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.95rem; flex-shrink: 0;
        }
        .nav-item a.active .nav-icon { background: rgba(255,255,255,0.25); }

        /* Logout di bawah sidebar */
        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid rgba(255,255,255,0.12);
        }
        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 12px;
            background: rgba(255,255,255,0.1);
            margin-bottom: 10px;
        }
        .sidebar-user .avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
            display: flex; align-items: center; justify-content: center;
            font-weight: 700; color: white; font-size: 0.9rem;
            flex-shrink: 0;
        }
        .sidebar-user .user-info { flex: 1; min-width: 0; }
        .sidebar-user .user-name {
            color: white; font-size: 0.85rem; font-weight: 600;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .sidebar-user .user-role { color: rgba(255,255,255,0.55); font-size: 0.72rem; }
        .btn-logout {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 11px 14px;
            background: rgba(255,59,48,0.2);
            border: 1px solid rgba(255,59,48,0.3);
            border-radius: 10px;
            color: rgba(255,180,180,0.95);
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-logout:hover {
            background: rgba(255,59,48,0.35);
            color: white;
            border-color: rgba(255,59,48,0.5);
        }
        .btn-logout .nav-icon {
            width: 30px; height: 30px;
            background: rgba(255,59,48,0.25);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .main-wrapper { margin-left: 260px; min-height: 100vh; }
        .topbar {
            background: white;
            padding: 14px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky; top: 0; z-index: 99;
        }
        .topbar h6 { margin: 0; font-weight: 600; color: #333; }
        .topbar-right { display: flex; align-items: center; gap: 12px; }
        .badge-date {
            background: #f0f4f8;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            color: #666;
        }
        .topbar-user {
            display: flex; align-items: center; gap: 8px;
            background: #f8fffe;
            border: 1px solid #e2f5ec;
            padding: 6px 14px 6px 8px;
            border-radius: 20px;
        }
        .topbar-user .t-avatar {
            width: 30px; height: 30px; border-radius: 50%;
            background: linear-gradient(135deg,#1a7a50,#25a96e);
            display: flex; align-items: center; justify-content: center;
            color: white; font-weight: 700; font-size: 0.78rem;
        }
        .topbar-user .t-name { font-size: 0.82rem; font-weight: 600; color: #2d5a3d; }
        .main-content { padding: 25px 30px; }
        .alert { border-radius: 12px; border: none; }
        .alert-success { background: #d1fae5; color: #065f46; }
        .alert-danger { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"><i class="bi bi-mortarboard-fill"></i></div>
        <h5>Sistem Informasi<br>Prestasi Siswa</h5>
        <small>Madrasah Aliyah</small>
    </div>
    <nav>
        <div class="nav-label">Menu Utama</div>
        <div class="nav-item">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-speedometer2"></i></span>
                Dashboard
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('siswa.index') }}" class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-people-fill"></i></span>
                Data Siswa
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('prestasi.index') }}" class="{{ request()->routeIs('prestasi.*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-trophy-fill"></i></span>
                Data Prestasi
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('kelas.index') }}" class="{{ request()->routeIs('kelas.*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-door-open-fill"></i></span>
                Data Kelas
            </a>
        </div>
        <div class="nav-item">
            <a href="{{ route('laporan.index') }}" class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="bi bi-file-earmark-pdf-fill"></i></span>
                Laporan PDF
            </a>
        </div>
    </nav>

    <!-- User & Logout di bawah sidebar -->
    <div class="sidebar-footer">
        @auth
        <div class="sidebar-user">
            <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                <span class="nav-icon"><i class="bi bi-box-arrow-right"></i></span>
                Keluar / Logout
            </button>
        </form>
        @endauth
    </div>
</div>

<!-- Main -->
<div class="main-wrapper">
    <div class="topbar">
        <h6><i class="bi bi-grid-fill me-2 text-success"></i>@yield('page-title', 'Dashboard')</h6>
        <div class="topbar-right">
            <span class="badge-date"><i class="bi bi-calendar3 me-1"></i>{{ now()->translatedFormat('d F Y') }}</span>
            @auth
            <div class="topbar-user">
                <div class="t-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                <span class="t-name">{{ Auth::user()->name }}</span>
            </div>
            @endauth
        </div>
    </div>
    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-x-circle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
