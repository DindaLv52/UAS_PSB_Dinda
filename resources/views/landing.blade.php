<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSB SMK GEMILANG</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            /* 🎯 PALET BIRU SOFT */
            --primary-blue: #2563eb;     /* Biru utama */
            --accent-blue: #60a5fa;      /* Biru aksen */
            --soft-blue-bg: #f1f5ff;     /* Background lembut */
            --dark-blue: #1e3a8a;        /* Biru gelap teks */
        }

        body {
            background-color: #ffffff;
            font-family: 'Inter', sans-serif;
            color: #1f2937;
        }

        /* NAVBAR */
        .navbar {
            background-color: var(--primary-blue) !important;
            padding: 15px 0;
            border-bottom: 3px solid var(--accent-blue);
        }
        .navbar-brand {
            font-size: 1.5rem;
            letter-spacing: -0.5px;
            color: white !important;
        }
        .navbar-brand span {
            color: #dbeafe;
        }

        /* HERO */
        .hero {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: -60px;
            right: -60px;
            width: 220px;
            height: 220px;
            background: #93c5fd;
            filter: blur(120px);
            opacity: 0.35;
        }

        .hero h1 {
            font-weight: 800;
            font-size: 3.3rem;
            margin-bottom: 1rem;
            letter-spacing: -1px;
        }

        .hero h4 {
            color: #bfdbfe;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .hero p.lead {
            font-size: 1.15rem;
            color: #e0e7ff;
            max-width: 720px;
            margin: 0 auto 2.5rem;
        }

        /* BUTTONS */
        .btn-light {
            background: #ffffff;
            border: none;
            color: var(--primary-blue);
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-light:hover {
            background: #eff6ff;
            color: var(--dark-blue);
            transform: translateY(-3px);
        }

        .btn-outline-light {
            border: 2px solid rgba(255,255,255,0.4);
            font-weight: 600;
            padding: 10px 30px;
            border-radius: 8px;
        }
        .btn-outline-light:hover {
            border-color: white;
            background: rgba(255,255,255,0.12);
            transform: translateY(-3px);
        }

        /* FITUR */
        .features-section {
            background-color: var(--soft-blue-bg);
            padding: 80px 0;
        }

        .section-title {
            font-weight: 800;
            font-size: 2.2rem;
            color: var(--dark-blue);
            margin-bottom: 10px;
        }

        .card-feature {
            border: none;
            border-radius: 20px;
            padding: 40px 30px;
            background: #ffffff;
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.08);
            transition: all 0.4s ease;
            height: 100%;
        }

        .card-feature:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 45px rgba(37, 99, 235, 0.15);
            background: linear-gradient(to bottom, #ffffff, #f1f5ff);
        }

        .feature-icon {
            font-size: 48px;
            margin-bottom: 20px;
            filter: drop-shadow(0 6px 12px rgba(37, 99, 235, 0.15));
        }

        .card-feature h5 {
            font-weight: 700;
            color: var(--primary-blue);
            margin-bottom: 15px;
        }

        /* FOOTER */
        footer {
            background-color: var(--dark-blue);
            padding: 40px 0;
        }
        .footer-text {
            color: #dbeafe;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            PSB <span>SMK</span> GEMILANG
        </a>
        <div class="ms-auto">
            <a href="/login" class="btn btn-link text-white text-decoration-none fw-semibold me-3">
                Login
            </a>
            <a href="/register" class="btn btn-light btn-sm px-4 shadow-sm">
                Daftar
            </a>
        </div>
    </div>
</nav>

<section class="hero text-center">
    <div class="container">
        <h4>SMK GEMILANG Tahun Ajaran 2026</h4>
        <h1>Penerimaan Siswa Baru</h1>
        <p class="lead">
            Sistem pendaftaran online yang aman, cepat, dan transparan
            untuk calon siswa SMK GEMILANG.
        </p>

        <div class="d-flex justify-content-center gap-3">
            <a href="/register" class="btn btn-light btn-lg">
                Daftar Sekarang
            </a>
            <a href="/login" class="btn btn-outline-light btn-lg">
                Login Akun
            </a>
        </div>
    </div>
</section>

<section class="features-section">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h3 class="section-title">Fitur Sistem PSB</h3>
                <p class="text-muted fs-5">
                    Semua proses pendaftaran dalam satu sistem terpadu
                </p>
            </div>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="card card-feature">
                    <div class="feature-icon">📝</div>
                    <h5>Pendaftaran Online</h5>
                    <p class="text-muted">
                        Formulir pendaftaran dapat diisi secara mandiri kapan saja dan di mana saja.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-feature">
                    <div class="feature-icon">📁</div>
                    <h5>Upload Berkas</h5>
                    <p class="text-muted">
                        Unggah dokumen persyaratan secara digital tanpa harus datang ke sekolah.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-feature">
                    <div class="feature-icon">✅</div>
                    <h5>Pengumuman</h5>
                    <p class="text-muted">
                        Pantau status verifikasi dan hasil seleksi langsung melalui dashboard siswa.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="text-white text-center">
    <div class="container">
        <p class="m-0 footer-text">
            © 2026 <strong>PSB SMK GEMILANG</strong> | Sistem Penerimaan Siswa Baru
        </p>
    </div>
</footer>

</body>
</html>
