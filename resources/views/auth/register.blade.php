<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi | PSB SMK GEMILANG</title>

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
            /* Background senada dengan login & landing */
            background: radial-gradient(circle at top right, #1e3a8a, #0f172a);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 40px 0;
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

        .register-container {
            width: 100%;
            max-width: 460px;
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

        .card-register {
            background: var(--glass-blue);
            backdrop-filter: blur(22px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 28px;
            padding: 40px 35px;
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.7);
        }

        .register-header h2 {
            color: #e0e7ff;
            font-weight: 700;
            font-size: 1.45rem;
            margin-bottom: 8px;
        }

        .register-header p {
            color: #bfdbfe;
            font-size: 0.85rem;
            margin-bottom: 30px;
            opacity: 0.85;
        }

        .form-label {
            color: #93c5fd;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-bottom: 8px;
        }

        .form-control {
            background: rgba(15, 23, 42, 0.55);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 14px;
            padding: 12px 18px;
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
            font-size: 0.9rem;
        }

        .btn-daftar {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            border: none;
            border-radius: 14px;
            padding: 14px;
            font-weight: 700;
            color: white;
            width: 100%;
            margin-top: 10px;
            transition: all 0.4s;
            box-shadow: 0 12px 25px -6px rgba(37, 99, 235, 0.5);
        }

        .btn-daftar:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 35px -6px rgba(37, 99, 235, 0.7);
            filter: brightness(1.08);
        }

        .login-link {
            text-align: center;
            margin-top: 25px;
            color: #bfdbfe;
            font-size: 0.85rem;
        }

        .login-link a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            border-bottom: 2px solid var(--accent-blue);
            padding-bottom: 2px;
        }

        .login-link a:hover {
            color: var(--accent-blue);
        }
    </style>
</head>
<body>

<div class="glow-circle" style="top: -120px; left: -120px;"></div>
<div class="glow-circle" style="bottom: -160px; right: -120px; background:#3b82f6;"></div>

<div class="register-container">
    <div class="school-name">
        SMK GEMILANG
    </div>

    <div class="card-register">
        <div class="register-header text-center">
            <h2>Buat Akun Baru</h2>
            <p>Lengkapi data untuk mulai pendaftaran online</p>
        </div>

        <form method="POST" action="/register">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="name" class="form-control"
                       placeholder="Nama sesuai ijazah"
                       required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Email Aktif</label>
                <input type="email" name="email" class="form-control"
                       placeholder="contoh@email.com"
                       required value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control"
                       placeholder="Minimal 8 karakter" required>
            </div>

            <button type="submit" class="btn btn-daftar">
                Daftar Sekarang
            </button>
        </form>

        <div class="login-link">
            Sudah punya akun?
            <a href="/login">Login di sini</a>
        </div>
    </div>
</div>

</body>
</html>
