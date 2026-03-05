<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DIKEDAI POS</title>

    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Outfit -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8fbff 0%, #e6f2ff 100%);
        }

        .auth-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .brand-logo {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 2rem;
            text-align: center;
        }

        .input-group-text {
            background-color: transparent;
            border-right: none;
            color: #94a3b8;
        }

        .input-group .form-control {
            border-left: none;
        }
    </style>
</head>

<body>

    <div class="auth-container">
        <div class="brand-logo">
            <!-- <span class="text-brand">DI</span>KEDAI -->
            <img src="/assets/images/logo/logo-text-biru.png" width="200" alt="">
        </div>

        <div class="card login-card p-4 p-md-5">
            <div class="card-body p-0">
                <h4 class="fw-bold mb-1">Selamat Datang!</h4>
                <p class="text-muted small mb-4">Silakan masuk ke akun Anda</p>

                <form action="<?= base_url('auth/login') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label small fw-medium">Alamat Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com" required autofocus>
                        </div>
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <label class="form-label small fw-medium">Kata Sandi</label>
                            <a href="<?= base_url('forgot-password') ?>" class="text-brand small text-decoration-none">Lupa Sandi?</a>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>

                    <div class="mb-4 d-flex align-items-center">
                        <input class="form-check-input mt-0" type="checkbox" value="" id="rememberMe">
                        <label class="form-check-label small ms-2 text-muted" for="rememberMe">
                            Ingat saya
                        </label>
                    </div>

                    <button type="submit" class="btn btn-brand w-100 mb-4">
                        Masuk Sekarang
                    </button>

                    <div class="text-center">
                        <p class="small text-muted mb-0">Belum punya akun? <a href="<?= base_url('register') ?>" class="text-brand fw-bold text-decoration-none">Daftar Gratis</a></p>
                    </div>
                </form>
            </div>
        </div>

        <div class="text-center mt-5">
            <p class="text-muted extra-small" style="font-size: 0.75rem;">&copy; <?= date('Y') ?> DIKEDAI POS. All rights reserved.</p>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>