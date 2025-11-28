<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Karyawan - PT Apple Keroak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f0f2f5;
            background-image: radial-gradient(#d1e7dd 1px, transparent 1px);
            background-size: 20px 20px;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            border: none;
        }

        .card-header-custom {
            background: #198754; /* Warna Hijau untuk kesan operasional/aman */
            padding: 30px 20px;
            text-align: center;
            color: white;
            position: relative;
        }

        .avatar-box {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: #198754;
            position: absolute;
            bottom: -40px;
            left: 50%;
            transform: translateX(-50%);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .card-body-custom {
            padding: 60px 30px 30px 30px; /* Padding atas besar untuk avatar */
        }

        .form-control-pill {
            border-radius: 50px;
            padding-left: 20px;
            background-color: #f8f9fa;
        }

        .btn-login {
            border-radius: 50px;
            padding: 10px;
            font-weight: bold;
            background: #198754;
            border: none;
        }
        
        .btn-login:hover {
            background: #157347;
        }
    </style>
</head>
<body>

    <div class="login-card animate__animated animate__fadeInUp">
        <div class="card-header-custom">
            <h5 class="mb-0 fw-bold">PORTAL KARYAWAN</h5>
            <small class="opacity-75">PT Apple Keroak</small>
            
            <div class="avatar-box">
                <i class="bi bi-person-badge"></i>
            </div>
        </div>

        <div class="card-body-custom">
            <div class="text-center mb-4">
                <h4 class="fw-bold text-dark">Selamat Bekerja!</h4>
                <p class="text-muted small">Silakan login untuk memulai aktivitas.</p>
            </div>

            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="position-relative">
                        <input type="text" class="form-control form-control-pill" placeholder="ID Karyawan / Username">
                        <i class="bi bi-person position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="position-relative">
                        <input type="password" class="form-control form-control-pill" placeholder="Kata Sandi">
                        <i class="bi bi-lock position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-login btn-block">
                        MASUK
                    </button>
                </div>
            </form>

            <div class="text-center mt-4 border-top pt-3">
                <a href="{{ route('login.admin') }}" class="text-decoration-none small text-muted">
                    Login sebagai Admin? Klik di sini
                </a>
            </div>
        </div>
    </div>

</body>
</html>