<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Kata Sandi | DIKEDAI POS</title>

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
            <img src="/assets/images/logo/logo-text-biru.png" width="200" alt="DIKEDAI">
        </div>

        <div class="card rounded-4 login-card p-4 p-md-5">
            <div class="card-body p-0">
                <div class="mb-4">
                    <a href="<?= base_url('login') ?>" class="text-brand small text-decoration-none fw-medium">
                        <i class="fa-solid fa-arrow-left me-2"></i>Kembali ke Login
                    </a>
                </div>

                <h4 class="fw-bold mb-1">Lupa Kata Sandi?</h4>
                <p class="text-muted small mb-4">Masukkan email Anda untuk menerima instruksi pemulihan kata sandi.</p>

                <form action="<?= base_url('auth/forgot') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="mb-4">
                        <label class="form-label small fw-medium">Alamat Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com" required autocomplete="off" autofocus>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-brand w-100 mb-2">
                        Kirim Instruksi
                    </button>
                </form>
            </div>
        </div>

        <footer class="text-center mt-5">
            <p class="extra-small" style="font-size: 0.75rem;">&copy; <?= date('Y') ?> DIKEDAI. All rights reserved.</p>
        </footer>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>