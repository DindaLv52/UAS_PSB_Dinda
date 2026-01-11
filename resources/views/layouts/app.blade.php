<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Dashboard') | PSB SMK GEMILANG </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Biru kalem & profesional */
            --primary-blue: #2563eb;    /* biru utama (soft) */
            --dark-blue: #1e3a8a;       /* navy */
            --soft-blue: #f5f8ff;       /* background */
            --border-blue: #dbeafe;     /* border halus */
        }

        html, body {
            height: 100%;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--soft-blue);
            display: flex;
            flex-direction: column;
        }

        /* TOPBAR */
        .topbar {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            padding: 14px 0;
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.25);
            border-bottom: 3px solid #93c5fd;
        }

        .app-title {
            font-weight: 700;
            font-size: 18px;
            color: #ffffff;
            letter-spacing: 0.5px;
        }

        .app-title span {
            color: #bfdbfe;
        }

        /* LOGOUT BUTTON */
        .btn-logout {
            background-color: rgba(255,255,255,0.15);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.4);
            font-size: 13px;
            padding: 6px 18px;
            transition: all .25s ease;
        }

        .btn-logout:hover {
            background-color: #ffffff;
            color: var(--primary-blue);
            border-color: #ffffff;
        }

        /* CONTENT */
        .content-wrapper {
            flex: 1;
        }

        /* CARD DEFAULT */
        .card {
            border-radius: 14px;
            border: 1px solid var(--border-blue);
        }

        /* FOOTER */
        footer {
            background: #ffffff;
            border-top: 1px solid var(--border-blue);
            color: #1e3a8a;
            font-size: 13px;
            font-weight: 500;
        }
    </style>
</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="app-title">
            PSB <span>SMK</span> GEMILANG
        </div>

        <form action="/logout" method="POST" class="m-0">
            @csrf
            <button class="btn btn-logout fw-semibold">
                Logout
            </button>
        </form>
    </div>
</div>

<!-- CONTENT -->
<div class="content-wrapper">
    <div class="container my-4">
        @yield('content')
    </div>
</div>

<!-- FOOTER -->
<footer class="text-center py-3">
    © 2026 <strong>PSB SMK GEMILANG</strong>. All rights reserved.
</footer>

</body>
</html>
