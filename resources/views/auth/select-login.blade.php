<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Akses Login - PT Apple Keroak</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- Google Fonts (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f0f2f5 0%, #eef2f6 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            overflow: hidden;
        }

        .main-container {
            width: 100%;
            max-width: 900px;
            padding: 20px;
        }

        .header-section {
            text-align: center;
            margin-bottom: 40px;
            animation: fadeInDown 0.8s ease;
        }

        .brand-logo {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 10px;
        }

        .role-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            border: 2px solid transparent;
            height: 100%;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }

        /* Efek Hover */
        .role-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        /* Variasi Kartu Admin */
        .role-card.admin:hover {
            border-color: #0d6efd;
            background: linear-gradient(to bottom, #ffffff, #f0f7ff);
        }
        .role-card.admin .icon-circle {
            background: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
        }

        /* Variasi Kartu Karyawan */
        .role-card.karyawan:hover {
            border-color: #198754;
            background: linear-gradient(to bottom, #ffffff, #f0fff4);
        }
        .role-card.karyawan .icon-circle {
            background: rgba(25, 135, 84, 0.1);
            color: #198754;
        }

        .icon-circle {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px auto;
            font-size: 2.5rem;
            transition: all 0.3s ease;
        }

        .role-title {
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .role-desc {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 25px;
        }

        .btn-action {
            width: 100%;
            padding: 12px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.9rem;
        }

        /* Animasi Masuk */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-up-1 { animation: fadeInUp 0.8s ease 0.2s backwards; }
        .animate-up-2 { animation: fadeInUp 0.8s ease 0.4s backwards; }

    </style>
</head>
<body>

    <div class="main-container">
        
        <!-- Header -->
        <div class="header-section">
            <div class="d-flex justify-content-center align-items-center mb-2">
                <i class="bi bi-buildings-fill brand-logo me-3"></i>
                <h1 class="fw-bold text-dark m-0">PT Apple Keroak</h1>
            </div>
            <p class="text-muted lead">Sistem Manajemen Produksi & Pengiriman Terintegrasi</p>
        </div>

        <div class="row g-4 justify-content-center">
            
            <!-- Pilihan 1: Admin -->
            <div class="col-md-5 animate-up-1">
                <a href="{{ route('login.admin') }}" class="text-decoration-none">
                    <div class="role-card admin">
                        <div class="icon-circle">
                            <i class="bi bi-shield-lock-fill"></i>
                        </div>
                        <h3 class="role-title">Administrator</h3>
                        <p class="role-desc">
                            Akses penuh ke manajemen sistem, data master, laporan, dan pengaturan pengguna.
                        </p>
                        <button class="btn btn-primary btn-action">
                            Masuk sebagai Admin <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </a>
            </div>

            <!-- Pilihan 2: Karyawan -->
            <div class="col-md-5 animate-up-2">
                <a href="{{ route('login.karyawan') }}" class="text-decoration-none">
                    <div class="role-card karyawan">
                        <div class="icon-circle">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <h3 class="role-title">Karyawan</h3>
                        <p class="role-desc">
                            Akses operasional untuk input data produksi harian dan status pengiriman.
                        </p>
                        <button class="btn btn-outline-success btn-action">
                            Masuk sebagai Karyawan <i class="bi bi-arrow-right ms-2"></i>
                        </button>
                    </div>
                </a>
            </div>

        </div>

        <div class="text-center mt-5 text-muted small animate-up-2">
            &copy; {{ date('Y') }} Tim IT PT Apple Keroak. All rights reserved.
        </div>
    </div>

</body>
</html>