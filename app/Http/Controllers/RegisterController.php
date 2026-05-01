<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun — Sistem Prestasi Siswa</title>
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
            padding: 24px 0;
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
        .register-wrapper {
            display: flex;
            width: 900px;
            min-height: 580px;
            background: white;
            border-radius: 24px;
            box-shadow: 0 30px 80px rgba(0,0,0,0.3);
            overflow: hidden;
            position: relative;
            z-index: 10;
        }
        /* ── LEFT PANEL ── */
        .register-left {
            flex: 1;
            background: linear-gradient(160deg, #0f4c35 0%, #1a7a50 60%, #25a96e 100%);
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        .register-left::before {
            content: '';
            position: absolute;
            width: 250px; height: 250px;
            border-radius: 50%;
            border: 40px solid rgba(255,255,255,0.06);
            bottom: -60px; right: -60px;
        }
        .register-left::after {
            content: '';
            position: absolute;
            width: 150px; height: 150px;
            border-radius: 50%;
            border: 30px solid rgba(255,255,255,0.06);
            top: -30px; right: 30px;
        }
        .register-left .brand-icon {
            width: 65px; height: 65px;
            background: rgba(255,255,255,0.18);
            border-radius: 18px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 24px;
            backdrop-filter: blur(5px);
        }
        .register-left h2 {
            color: white;
            font-weight: 800;
            font-size: 1.7rem;
            line-height: 1.3;
            margin-bottom: 10px;
        }
        .register-left p {
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
        /* ── RIGHT PANEL ── */
        .register-right {
            flex: 1;
            padding: 45px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            overflow-y: auto;
        }
        .register-right h3 {
            font-weight: 800;
            color: #1a202c;
            font-size: 1.6rem;
            margin-bottom: 6px;
        }
        .register-right .subtitle {
            color: #718096;
            font-size: 0.9rem;
            margin-bottom: 28px;
        }
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #4a5568;
            margin-bottom: 6px;
        }
        .input-group-custom {
            position: relative;
            margin-bottom: 18px;
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
            background: #fff5f5;
        }
        .input-group-custom .toggle-pw {
            position: absolute;
            right: 14px; top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            cursor: pointer;
            font-size: 1rem;
            z-index: 5;
        }
        .input-group-custom .toggle-pw:hover { color: #1a7a50; }
        .invalid-feedback { font-size: 0.8rem; color: #e53e3e; margin-top: 4px; display: block; }
        .btn-register {
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
            margin-top: 6px;
        }
        .btn-register:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(26,122,80,0.35);
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.875rem;
            color: #718096;
        }
        .login-link a {
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
            margin-bottom: 18px;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }
        .alert-error ul { margin: 0; padding-left: 16px; }
        @media (max-width: 768px) {
            .register-wrapper { flex-direction: column; width: 95%; }
            .register-left { display: none; }
            .register-right { padding: 35px 28px; }
        }
    </style>
</head>
<body>
<div class="floating-shapes">
    <span></span><span></span><span></span><span></span>
</div>

<div class="register-wrapper">
    <!-- Left Panel -->
    <div class="register-left">
        <div class="brand-icon"><i class="bi bi-mortarboard-fill" style="color:white;"></i></div>
        <h2>Bergabung<br>Bersama Kami ✨</h2>
        <p>Buat akun untuk mulai mengelola data prestasi siswa dengan mudah dan efisien.</p>
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
    <div class="register-right">
        <h3>Buat Akun Baru 🎓</h3>
        <p class="subtitle">Isi data di bawah untuk mendaftar</p>

        @if($errors->any())
        <div class="alert-error">
            <i class="bi bi-exclamation-circle-fill mt-1"></i>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-1">
                <label class="form-label">Nama Lengkap</label>
            </div>
            <div class="input-group-custom">
                <i class="bi bi-person-fill input-icon"></i>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap"
                    class="{{ $errors->has('nama') ? 'is-invalid' : '' }}"
                    required autofocus>
                @error('nama')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-1">
                <label class="form-label">Alamat Email</label>
            </div>
            <div class="input-group-custom">
                <i class="bi bi-envelope-fill input-icon"></i>
                <input type="email" name="email" value="{{ old('email') }}"
                    placeholder="contoh@email.com"
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    required>
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-1">
                <label class="form-label">Password</label>
            </div>
            <div class="input-group-custom">
                <i class="bi bi-lock-fill input-icon"></i>
                <input type="password" name="password" id="pw1"
                    placeholder="Minimal 6 karakter"
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    required>
                <i class="bi bi-eye-slash toggle-pw" onclick="togglePw('pw1', this)"></i>
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-1">
                <label class="form-label">Konfirmasi Password</label>
            </div>
            <div class="input-group-custom">
                <i class="bi bi-lock-fill input-icon"></i>
                <input type="password" name="password_confirmation" id="pw2"
                    placeholder="Ulangi password"
                    required>
                <i class="bi bi-eye-slash toggle-pw" onclick="togglePw('pw2', this)"></i>
            </div>

            <button type="submit" class="btn-register">
                <i class="bi bi-person-plus-fill me-2"></i>Daftar Sekarang
            </button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
        </div>
    </div>
</div>

<script>
function togglePw(id, icon) {
    const input = document.getElementById(id);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
    } else {
        input.type = 'password';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>