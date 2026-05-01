<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Sistem Prestasi Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f4c35 0%, #1a7a50 50%, #0d3d6b 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            background: rgba(255,255,255,0.03);
            border-radius: 50%;
            top: -150px; right: -150px;
        }
        body::after {
            content: '';
            position: absolute;
            width: 400px; height: 400px;
            background: rgba(255,255,255,0.03);
            border-radius: 50%;
            bottom: -100px; left: -100px;
        }
        .floating-shapes span {
            position: absolute;
            display: block;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
            animation: float 6s ease-in-out infinite;
        }
        .floating-shapes span:nth-child(1) { width: 80px; height: 80px; top: 15%; left: 10%; animation-delay: 0s; }
        .floating-shapes span:nth-child(2) { width: 50px; height: 50px; top: 70%; left: 80%; animation-delay: 2s; }
        .floating-shapes span:nth-child(3) { width: 120px; height: 120px; top: 50%; left: 5%; animation-delay: 4s; }
        .floating-shapes span:nth-child(4) { width: 60px; height: 60px; top: 20%; left: 85%; animation-delay: 1s; }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        .login-wrapper {
            display: flex;
            width: 900px;
            min-height: 540px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3);
            overflow: hidden;
            position: relative;
            z-index: 10;
        }
        .login-left {
            flex: 1;
            background: linear-gradient(160deg, #0f4c35 0%, #1a7a50 60%, #25a96e 100%);
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .login-left::before {
            content: '';
            position: absolute;
            width: 250px; height: 250px;
            border-radius: 50%;
            border: 40px solid rgba(255,255,255,0.06);
            bottom: -60px; right: -60px;
        }
        .login-left::after {
            content: '';
            position: absolute;
            width: 150px; height: 150px;
            border-radius: 50%;
            border: 30px solid rgba(255,255,255,0.06);
            top: -30px; right: 30px;
        }
        .login-left .brand-icon {
            width: 65px; height: 65px;
            background: rgba(255,255,255,0.18);
            border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 24px;
            backdrop-filter: blur(5px);
        }
        .login-left h2 {
            color: white;
            font-weight: 800;
            font-size: 1.7rem;
            line-height: 1.3;
            margin-bottom: 10px;
        }
        .login-left p {
            color: rgba(255,255,255,0.7);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        .feature-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 14px;
        }
        .feature-item .fi-icon {
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: white;
            flex-shrink: 0;
        }
        .feature-item span {
            color: rgba(255,255,255,0.85);
            font-size: 0.875rem;
        }
        .login-right {
            flex: 1;
            padding: 50px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-right h3 {
            font-weight: 800;
            color: #1a202c;
            font-size: 1.6rem;
            margin-bottom: 6px;
        }
        .login-right .subtitle {
            color: #718096;
            font-size: 0.9rem;
            margin-bottom: 32px;
        }
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #4a5568;
            margin-bottom: 6px;
        }
        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }
        .input-group-custom .input-icon {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 1rem;
            z-index: 5;
        }
        .input-group-custom input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 0.9rem;
            color: #2d3748;
            background: #f7fafc;
            transition: all 0.2s;
            outline: none;
        }
        .input-group-custom input:focus {
            border-color: #1a7a50;
            background: white;
            box-shadow: 0 0 0 3px rgba(26,122,80,0.1);
        }
        .input-group-custom input.is-invalid {
            border-color: #e53e3e;
        }
        .invalid-feedback { font-size: 0.8rem; color: #e53e3e; margin-top: 4px; }
        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #1a7a50, #25a96e);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s;
            letter-spacing: 0.3px;
            margin-top: 8px;
        }
        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(26,122,80,0.35);
        }
        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
            font-size: 0.85rem;
        }
        .remember-row label { color: #4a5568; cursor: pointer; }
        .remember-row a { color: #1a7a50; text-decoration: none; font-weight: 600; }
        .register-link {
            text-align: center;
            margin-top: 22px;
            font-size: 0.875rem;
            color: #718096;
        }
        .register-link a {
            color: #1a7a50;
            font-weight: 700;
            text-decoration: none;
        }
        .alert-error {
            background: #fff5f5;
            border: 1px solid #fed7d7;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.85rem;
            color: #c53030;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        @media (max-width: 768px) {
            .login-wrapper { flex-direction: column; width: 95%; }
            .login-left { display: none; }
            .login-right { padding: 35px 28px; }
        }
    </style>
</head>
<body>
<div class="floating-shapes">
    <span></span><span></span><span></span><span></span>
</div>

<div class="login-wrapper">
    <!-- Left Panel -->
    <div class="login-left">
        <div class="brand-icon"><i class="bi bi-mortarboard-fill" style="color:white;"></i></div>
        <h2>Sistem Informasi<br>Prestasi Siswa</h2>
        <p>Platform digital untuk mengelola dan memantau prestasi akademik siswa Madrasah Aliyah secara efisien.</p>
        <div class="feature-item">
            <div class="fi-icon"><i class="bi bi-people-fill"></i></div>
            <span>Kelola data siswa dengan mudah</span>
        </div>
        <div class="feature-item">
            <div class="fi-icon"><i class="bi bi-trophy-fill"></i></div>
            <span>Catat & pantau semua prestasi</span>
        </div>
        <div class="feature-item">
            <div class="fi-icon"><i class="bi bi-bar-chart-fill"></i></div>
            <span>Analisis statistik prestasi real-time</span>
        </div>
        <div class="feature-item">
            <div class="fi-icon"><i class="bi bi-file-earmark-pdf-fill"></i></div>
            <span>Ekspor laporan ke PDF otomatis</span>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="login-right">
        <h3>Selamat Datang 👋</h3>
        <p class="subtitle">Masuk ke akun Anda untuk melanjutkan</p>

        @if($errors->any())
        <div class="alert-error">
            <i class="bi bi-exclamation-circle-fill"></i>
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-1">
                <label class="form-label">Alamat Email</label>
            </div>
            <div class="input-group-custom">
                <i class="bi bi-envelope-fill input-icon"></i>
                <input type="email" name="email" value="{{ old('email') }}"
                    placeholder="contoh@email.com"
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-1">
                <label class="form-label">Password</label>
            </div>
            <div class="input-group-custom">
                <i class="bi bi-lock-fill input-icon"></i>
                <input type="password" name="password" id="passwordInput"
                    placeholder="Masukkan password"
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-row">
                <label>
                    <input type="checkbox" name="remember" style="accent-color:#1a7a50;"> Ingat saya
                </label>
            </div>

            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right me-2"></i>Masuk Sekarang
            </button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
