<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PSB SMK GEMILANG</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@800&display=swap" rel="stylesheet">

    <style>
        :root {
            /* 🎯 PALET BIRU SOFT */
            --primary-blue: #2563eb;
            --accent-blue: #60a5fa;
            --deep-blue: #1e3a8a;
            --glass-blue: rgba(255, 255, 255, 0.08);
        }

        body {
            /* Background biru gelap elegan */
            background: radial-gradient(circle at top left, #1e3a8a, #0f172a);
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        /* Glow dekorasi */
        .glow-circle {
            position: absolute;
            width: 420px;
            height: 420px;
            background: var(--accent-blue);
            filter: blur(180px);
            border-radius: 50%;
            z-index: -1;
            opacity: 0.25;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            z-index: 10;
        }

        /* NAMA SEKOLAH */
        .school-name {
            font-family: 'Montserrat', sans-serif;
            font-weight: 800;
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 25px;
            background: linear-gradient(to right, #ffffff, #bfdbfe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 2px;
            text-shadow: 0 10px 20px rgba(0,0,0,0.25);
        }

        .card-login {
            background: var(--glass-blue);
            backdrop-filter: blur(22px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 28px;
            padding: 45px 35px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.7);
        }

        .login-header h2 {
            color: #e0e7ff;
            font-weight: 700;
            font-size: 1.4rem;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #bfdbfe;
            font-size: 0.85rem;
            margin-bottom: 35px;
            opacity: 0.85;
        }

        .form-label {
            color: #93c5fd;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 10px;
        }

        .form-control {
            background: rgba(15, 23, 42, 0.55);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 14px;
            padding: 14px 18px;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(15, 23, 42, 0.7);
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 5px rgba(96, 165, 250, 0.25);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.35);
        }

        .btn-masuk {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            border: none;
            border-radius: 14px;
            padding: 14px;
            font-weight: 700;
            color: white;
            width: 100%;
            margin-top: 15px;
            transition: all 0.4s;
            box-shadow: 0 12px 25px -6px rgba(37, 99, 235, 0.5);
        }

        .btn-masuk:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px -6px rgba(37, 99, 235, 0.7);
            filter: brightness(1.08);
        }

        .register-link {
            text-align: center;
            margin-top: 30px;
            color: #bfdbfe;
            font-size: 0.85rem;
        }

        .register-link a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            border-bottom: 2px solid var(--accent-blue);
            padding-bottom: 2px;
        }

        .register-link a:hover {
            color: var(--accent-blue);
        }
    </style>
</head>
<body>

<div class="glow-circle" style="top: -120px; right: -120px;"></div>
<div class="glow-circle" style="bottom: -160px; left: -120px; background:#3b82f6;"></div>

<div class="login-container">
    <div class="school-name">
        SMK GEMILANG
    </div>

    <div class="card-login">
        <div class="login-header text-center">
            <h2>Portal Login</h2>
            <p>Penerimaan Siswa Baru 2026</p>
        </div>

        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control"
                       placeholder="masukkan email anda"
                       required value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control"
                       placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-masuk">
                Masuk Sekarang
            </button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="/register">Daftar Sekarang</a>
        </div>
    </div>
</div>

</body>
</html>
