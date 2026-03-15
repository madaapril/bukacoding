<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan | BukaCoding</title>
    <meta name="description" content="Syarat dan ketentuan penggunaan platform BukaCoding – platform kelas low-code terbaik.">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7C3AED',
                        'primary-dark': '#5B21B6',
                        accent: '#F97316',
                        surface: '#0F0A1E',
                        card: '#1A1035',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Remix Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="shortcut icon" href="/assets/images/logo/logo.png" type="image/x-icon">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #0F0A1E;
            color: #E2E8F0;
        }

        /* Noise Grain Texture */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0.2;
            pointer-events: none;
        }

        .navbar-glass {
            background: rgba(15, 10, 30, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(124, 58, 237, 0.15);
        }

        .gradient-text {
            background: linear-gradient(135deg, #A78BFA 0%, #7C3AED 40%, #F97316 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .gradient-text-accent {
            background: linear-gradient(90deg, #F97316, #FB923C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .terms-card {
            background: rgba(26, 16, 53, 0.7);
            border: 1px solid rgba(124, 58, 237, 0.2);
            backdrop-filter: blur(10px);
        }

        .section-divider {
            border-color: rgba(124, 58, 237, 0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, #7C3AED, #5B21B6);
            box-shadow: 0 8px 30px rgba(124, 58, 237, 0.35);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 40px rgba(124, 58, 237, 0.55);
        }

        .footer-glass {
            background: rgba(15, 10, 30, 0.9);
            border-top: 1px solid rgba(124, 58, 237, 0.15);
        }

        .terms-number {
            background: linear-gradient(135deg, #7C3AED, #5B21B6);
            min-width: 2rem;
            height: 2rem;
        }

        .tag-purple {
            background: rgba(124, 58, 237, 0.2);
            color: #C4B5FD;
            border: 1px solid rgba(124, 58, 237, 0.3);
        }
    </style>
</head>

<body class="font-sans antialiased min-h-screen">

    <!-- NAVBAR -->
    <nav class="navbar-glass fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2.5 group">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-accent flex items-center justify-center shadow-lg shadow-primary/30 group-hover:scale-110 transition-transform duration-300">
                        <i class="ri-code-s-slash-line text-white text-lg"></i>
                    </div>
                    <span class="text-white font-extrabold text-xl tracking-tight">
                        Buka<span class="gradient-text-accent">Coding</span>
                    </span>
                </a>

                <!-- Menu tengah -->
                <div class="hidden md:flex items-center gap-1">
                    <a href="/#home" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg text-sm font-medium transition-all duration-200">Home</a>
                    <a href="/#kelas" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg text-sm font-medium transition-all duration-200">Kelas</a>
                </div>

                <!-- Tombol kanan -->
                <div class="flex items-center gap-3">
                    <a href="/login" class="btn-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl flex items-center gap-2">
                        <i class="ri-login-circle-line text-base"></i>
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="relative pt-28 pb-20 overflow-hidden">

        <!-- Background blobs -->
        <div class="blob w-96 h-96 bg-primary top-0 -left-32" style="opacity:0.15;"></div>
        <div class="blob w-72 h-72 bg-accent bottom-32 right-0" style="opacity:0.1;"></div>
        <div class="blob w-64 h-64 bg-purple-800 top-1/2 left-1/2 -translate-x-1/2" style="opacity:0.1;"></div>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 relative z-10">

            <!-- Header -->
            <div class="text-center mb-12">
                <span class="tag-purple text-xs font-semibold px-4 py-1.5 rounded-full inline-block mb-5">
                    <i class="ri-file-text-line mr-1"></i> Dokumen Legal
                </span>
                <h1 class="text-4xl sm:text-5xl font-extrabold text-white mb-4 leading-tight">
                    Syarat &amp; <span class="gradient-text">Ketentuan</span>
                </h1>
                <p class="text-slate-500 text-sm">
                    Terakhir diperbarui: <?= tanggal_indonesia(date('Y-m-d')) ?>
                </p>
            </div>

            <!-- Terms Card -->
            <div class="terms-card rounded-3xl p-8 sm:p-10 space-y-8">

                <!-- Intro notice -->
                <div class="flex items-start gap-4 bg-primary/10 border border-primary/20 rounded-2xl p-5">
                    <div class="w-10 h-10 bg-primary/20 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="ri-shield-check-line text-violet-400 text-xl"></i>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        Dengan mendaftar atau menggunakan layanan <strong class="text-violet-300">BukaCoding</strong>, kamu menyetujui seluruh syarat dan ketentuan yang berlaku. Harap baca dengan seksama sebelum melanjutkan.
                    </p>
                </div>

                <!-- Section 1 -->
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="terms-number rounded-xl flex items-center justify-center text-white text-sm font-bold" style="min-width:2rem; height:2rem;">1</div>
                        <h2 class="text-white font-bold text-lg">Pendahuluan</h2>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed pl-11">
                        BukaCoding adalah platform kelas online yang berfokus pada metode pengembangan aplikasi modern yang efisien. Kami hadir untuk membantu siapa saja — dari pemula hingga profesional — membangun aplikasi nyata dengan pendekatan Low-Code, No-Code, serta pemanfaatan tools pemrograman praktis tanpa harus mempelajari segalanya dari nol.
                    </p>
                </div>

                <hr class="section-divider border-t">

                <!-- Section 2 -->
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="terms-number rounded-xl flex items-center justify-center text-white text-sm font-bold" style="min-width:2rem; height:2rem;">2</div>
                        <h2 class="text-white font-bold text-lg">Penggunaan Layanan</h2>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed pl-11">
                        Layanan BukaCoding mencakup akses ke video kelas, materi belajar, sesi live, dan komunitas. Kamu bertanggung jawab penuh atas aktivitas yang dilakukan melalui akunmu, termasuk menjaga kerahasiaan kata sandi dan tidak menyebarkan konten kelas tanpa izin.
                    </p>
                </div>

                <hr class="section-divider border-t">

                <!-- Section 3 -->
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="terms-number rounded-xl flex items-center justify-center text-white text-sm font-bold" style="min-width:2rem; height:2rem;">3</div>
                        <h2 class="text-white font-bold text-lg">Akun Pengguna</h2>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed pl-11">
                        Untuk mengakses kelas, kamu wajib membuat akun dengan data yang valid. Satu akun hanya boleh digunakan oleh satu orang. BukaCoding berhak menonaktifkan akun yang terbukti melakukan pelanggaran, termasuk berbagi akun, plagiarisme, atau aktivitas merugikan platform.
                    </p>
                </div>

                <hr class="section-divider border-t">

                <!-- Section 4 -->
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="terms-number rounded-xl flex items-center justify-center text-white text-sm font-bold" style="min-width:2rem; height:2rem;">4</div>
                        <h2 class="text-white font-bold text-lg">Hak Kekayaan Intelektual</h2>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed pl-11">
                        Seluruh konten di BukaCoding — termasuk video, modul, kode contoh, dan desain — merupakan hak milik BukaCoding dan instruktur terkait. Pengguna tidak diperbolehkan menyalin, mendistribusikan, atau menjual ulang konten tersebut tanpa izin tertulis.
                    </p>
                </div>

                <hr class="section-divider border-t">

                <!-- Section 5 -->
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="terms-number rounded-xl flex items-center justify-center text-white text-sm font-bold" style="min-width:2rem; height:2rem;">5</div>
                        <h2 class="text-white font-bold text-lg">Privasi Data</h2>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed pl-11">
                        Kami menghargai privasi kamu. Data pribadi yang kamu berikan — seperti nama, email, dan riwayat belajar — digunakan hanya untuk keperluan layanan BukaCoding dan tidak akan dijual kepada pihak ketiga. Seluruh data dikelola sesuai prinsip privasi yang berlaku.
                    </p>
                </div>

                <hr class="section-divider border-t">

                <!-- Section 6 -->
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="terms-number rounded-xl flex items-center justify-center text-white text-sm font-bold" style="min-width:2rem; height:2rem;">6</div>
                        <h2 class="text-white font-bold text-lg">Kebijakan Pembayaran & Refund</h2>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed pl-11">
                        Kelas berbayar di BukaCoding dibeli secara permanen (akses seumur hidup). Refund hanya dapat dilakukan dalam 3 hari setelah pembelian jika kurang dari 20% konten kelas telah diakses. Setelah batas tersebut, pembelian dianggap final.
                    </p>
                </div>

                <hr class="section-divider border-t">

                <!-- Section 7 -->
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="terms-number rounded-xl flex items-center justify-center text-white text-sm font-bold" style="min-width:2rem; height:2rem;">7</div>
                        <h2 class="text-white font-bold text-lg">Batasan Tanggung Jawab</h2>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed pl-11">
                        BukaCoding tidak bertanggung jawab atas kerugian tidak langsung yang timbul dari penggunaan atau ketidaktersediaan layanan kami. Kami berkomitmen untuk menjaga ketersediaan platform, namun gangguan teknis sesekali dapat terjadi di luar kendali kami.
                    </p>
                </div>

                <hr class="section-divider border-t">

                <!-- Section 8 -->
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="terms-number rounded-xl flex items-center justify-center text-white text-sm font-bold" style="min-width:2rem; height:2rem;">8</div>
                        <h2 class="text-white font-bold text-lg">Perubahan Ketentuan</h2>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed pl-11">
                        BukaCoding berhak memperbarui syarat dan ketentuan ini sewaktu-waktu. Perubahan signifikan akan diinformasikan melalui email atau notifikasi di platform. Penggunaan layanan setelah pembaruan dianggap sebagai persetujuan terhadap ketentuan yang baru.
                    </p>
                </div>

                <hr class="section-divider border-t">

                <!-- CTA -->
                <div class="text-center pt-2">
                    <p class="text-slate-500 text-sm mb-6">Dengan mendaftar, kamu menyetujui seluruh syarat di atas.</p>
                    <a href="<?= base_url('register') ?>" class="btn-primary inline-flex items-center gap-2 text-white font-bold px-8 py-3.5 rounded-2xl text-base">
                        <i class="ri-user-add-line"></i>
                        Saya Mengerti, Daftar Sekarang
                    </a>
                    <div class="mt-4">
                        <a href="/" class="text-slate-500 text-sm hover:text-violet-400 transition-colors">
                            <i class="ri-arrow-left-line"></i> Kembali ke Beranda
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="footer-glass relative z-10 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <!-- Logo & copyright -->
                <div class="flex flex-col sm:flex-row items-center gap-4 text-center sm:text-left">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                            <i class="ri-code-s-slash-line text-white text-sm"></i>
                        </div>
                        <span class="text-white font-extrabold text-lg">Buka<span class="gradient-text-accent">Coding</span></span>
                    </div>
                    <span class="hidden sm:block text-slate-700">|</span>
                    <p class="text-slate-500 text-sm">
                        &copy; <?= date('Y') ?> BukaCoding. All rights reserved.
                    </p>
                </div>

                <!-- Social icons -->
                <div class="flex items-center gap-3">
                    <a href="https://instagram.com/madaapril" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center text-slate-400 hover:text-white hover:border-pink-500/50 hover:bg-pink-500/10 transition-all duration-300 hover:-translate-y-1 group"
                        aria-label="Instagram BukaCoding">
                        <i class="ri-instagram-line text-lg group-hover:text-pink-400 transition-colors"></i>
                    </a>
                    <a href="https://youtube.com/@MohammadaAprilianto" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center text-slate-400 hover:text-white hover:border-red-500/50 hover:bg-red-500/10 transition-all duration-300 hover:-translate-y-1 group"
                        aria-label="YouTube BukaCoding">
                        <i class="ri-youtube-line text-lg group-hover:text-red-400 transition-colors"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>