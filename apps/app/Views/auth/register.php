<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | DIKEDAI POS</title>

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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f8fbff 0%, #e6f2ff 100%);
            padding: 40px 0;
        }

        .auth-container {
            width: 100%;
            max-width: 500px;
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

        .input-group .form-control,
        .input-group .form-select {
            border-left: none;
        }

        .form-select {
            padding: 0.75rem 1rem;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background-color: #fcfdfe;
        }

        .form-select:focus {
            box-shadow: 0 0 0 4px rgba(86, 167, 254, 0.15);
            border-color: var(--brand-color);
        }
    </style>
</head>

<body>

    <div class="auth-container">
        <div class="brand-logo">
            <img src="/assets/images/logo/logo-text-biru.png" width="200" alt="DIKEDAI">
        </div>

        <div class="card login-card p-4 p-md-5">
            <div class="card-body p-0">
                <h4 class="fw-bold mb-1">Mulai Gratis!</h4>
                <p class="text-muted small mb-4">Buat akun bisnis Anda sekarang</p>

                <form action="<?= base_url('auth/register') ?>" method="POST">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label small fw-medium">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input type="text" name="fullname" class="form-control" placeholder="Nama Anda" required autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 mb-3">
                            <label class="form-label small fw-medium">Nama Kedai</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-store"></i></span>
                                <input type="text" name="company_name" class="form-control" placeholder="Contoh: Kedai Kopi" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label small fw-medium">Kategori</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                                <select name="company_category" class="form-select" required>
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="Cafe">Cafe</option>
                                    <option value="Restoran">Restoran</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-medium">Alamat Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-medium">Kata Sandi</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>

                    <div class="mb-4 d-flex align-items-start">
                        <input class="form-check-input mt-1" type="checkbox" value="" id="terms" required>
                        <label class="form-check-label small ms-2 text-muted" for="terms">
                            Saya setuju dengan <a href="<?= base_url('syarat-ketentuan') ?>" class="text-brand text-decoration-none">Syarat & Ketentuan</a> yang berlaku.
                        </label>
                    </div>

                    <button type="submit" class="btn btn-brand w-100 mb-4">
                        Daftar Bisnis Saya
                    </button>

                    <div class="text-center">
                        <p class="small text-muted mb-0">Sudah punya akun? <a href="<?= base_url('login') ?>" class="text-brand fw-bold text-decoration-none">Masuk Saja</a></p>
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