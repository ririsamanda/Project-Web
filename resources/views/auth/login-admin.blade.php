<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - PT Apple Keroak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body, html { height: 100%; overflow: hidden; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        .bg-admin {
            background: linear-gradient(135deg, #0d6efd 0%, #0043a8 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 50px;
        }

        .login-section {
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }
        
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
            background-color: #fff;
        }

        .btn-primary {
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            background: #0d6efd;
            border: none;
        }

        .btn-primary:hover {
            background: #0b5ed7;
        }

        .decorative-circle {
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            position: absolute;
            top: -50px;
            left: -50px;
        }
    </style>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            
            <!-- Sisi Kiri: Branding & Visual -->
            <div class="col-md-6 d-none d-md-flex bg-admin position-relative">
                <div class="decorative-circle"></div>
                <div class="z-2">
                    <h1 class="display-4 fw-bold mb-3"><i class="bi bi-buildings-fill me-3"></i>PT Apple Keroak</h1>
                    <p class="lead mb-4">Sistem Manajemen Produksi & Pengiriman Terintegrasi.</p>
                    <div class="d-flex gap-3">
                        <div class="bg-white bg-opacity-25 p-3 rounded text-center" style="width: 120px;">
                            <h3 class="fw-bold mb-0">100%</h3>
                            <small>Secure</small>
                        </div>
                        <div class="bg-white bg-opacity-25 p-3 rounded text-center" style="width: 120px;">
                            <h3 class="fw-bold mb-0">24/7</h3>
                            <small>Monitoring</small>
                        </div>
                    </div>
                </div>
                <small class="position-absolute bottom-0 start-0 p-5 opacity-50">&copy; 2025 IT Dept Team.</small>
            </div>

            <!-- Sisi Kanan: Form Login -->
            <div class="col-md-6 login-section">
                <div class="w-75" style="max-width: 450px;">
                    <div class="mb-4 text-center text-md-start">
                        <span class="badge bg-primary bg-opacity-10 text-primary mb-2 px-3 py-2 rounded-pill">Administrator Access</span>
                        <h2 class="fw-bold mt-2">Selamat Datang Kembali</h2>
                        <p class="text-muted">Silakan masukkan kredensial admin Anda.</p>
                    </div>

                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">USERNAME / EMAIL</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person-lock"></i></span>
                                <input type="text" class="form-control border-start-0" placeholder="admin@applekeroak.com">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-muted">PASSWORD</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control border-start-0" placeholder="••••••••">
                            </div>
                        </div>

                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-primary">Masuk ke Dashboard</button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{ route('login.karyawan') }}" class="text-decoration-none text-muted small">
                            <i class="bi bi-arrow-right-circle me-1"></i> Beralih ke Login Karyawan
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>