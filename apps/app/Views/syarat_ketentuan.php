<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan | DIKEDAI</title>

    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Outfit -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <style>
        body {
            background-color: #f8fbff;
            padding: 50px 0;
        }

        .terms-card {
            border-radius: 20px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .terms-content {
            line-height: 1.8;
            color: #475569;
        }

        h5 {
            color: var(--brand-color);
            font-weight: 700;
            margin-top: 2rem;
        }

        @media (max-width: 767.98px) {
            .terms-content p {
                font-size: 0.9rem;
            }

            .terms-content h5 {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <img src="/assets/images/logo/logo-text-biru.png" width="180" alt="DIKEDAI" class="mb-4">
                    <h2 class="fw-bold">Syarat & Ketentuan</h2>
                    <p class="text-muted">Terakhir diperbarui: <?= tanggal_indonesia(date('Y-m-d')) ?></p>
                </div>

                <div class="card terms-card p-4 p-md-5">
                    <div class="card-body terms-content p-0">
                        <h5 class="mt-1">1. Pendahuluan</h5>
                        <p class="">Selamat datang di DIKEDAI. Dengan menggunakan layanan kami, Anda setuju untuk terikat oleh syarat dan ketentuan berikut. Harap baca dengan seksama sebelum menggunakan aplikasi kami.</p>

                        <h5>2. Penggunaan Layanan</h5>
                        <p class="">DIKEDAI menyediakan sistem manajemen kasir (Point of Sale) untuk membantu operasional bisnis Anda. Anda bertanggung jawab penuh atas aktivitas yang terjadi di bawah akun Anda dan keakuratan data yang Anda masukkan.</p>

                        <h5>3. Akun Pengguna</h5>
                        <p class="">Untuk menggunakan layanan kami, Anda harus mendaftar dan menjaga keamanan kata sandi Anda. Kami berhak menonaktifkan akun jika ditemukan pelanggaran terhadap ketentuan layanan kami.</p>

                        <h5>4. Privasi Data</h5>
                        <p class="">Kami menghargai privasi Anda. Data bisnis dan transaksi Anda akan kami kelola sesuai dengan kebijakan privasi kami yang bertujuan untuk melindungi informasi sensitif Anda.</p>

                        <h5>5. Batasan Tanggung Jawab</h5>
                        <p class="">DIKEDAI tidak bertanggung jawab atas kerugian tidak langsung, insidental, atau konsekuensial yang timbul dari penggunaan atau ketidakmampuan menggunakan layanan kami.</p>

                        <h5>6. Perubahan Ketentuan</h5>
                        <p class="">Kami berhak untuk mengubah syarat dan ketentuan ini sewaktu-waktu. Perubahan akan diinformasikan melalui aplikasi atau email terdaftar.</p>

                        <div class="mt-1 pt-4 border-top text-center">
                            <a href="<?= base_url('register') ?>" class="btn btn-brand">Saya Mengerti</a>
                        </div>
                    </div>
                </div>

                <footer class="text-center mt-4">
                    <p class="small">&copy; <?= date('Y') ?> DIKEDAI. All rights reserved.</p>
                </footer>
            </div>
        </div>
    </div>

</body>

</html>