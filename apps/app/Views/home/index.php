<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BukaCoding – Jago Low-Code Selama Ramadhan</title>
    <meta name="description" content="BukaCoding: Platform kelas LMS Coding terbaik. Jago Low-Code Selama Ramadhan bersama instruktur berpengalaman.">

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
                        'accent-light': '#FED7AA',
                        surface: '#0F0A1E',
                        card: '#1A1035',
                    },
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 9s ease-in-out infinite',
                        'glow': 'glow 3s ease-in-out infinite',
                        'badge-pulse': 'badge-pulse 2s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-18px)'
                            },
                        },
                        glow: {
                            '0%, 100%': {
                                boxShadow: '0 0 20px rgba(124,58,237,0.4)'
                            },
                            '50%': {
                                boxShadow: '0 0 45px rgba(124,58,237,0.8)'
                            },
                        },
                        'badge-pulse': {
                            '0%, 100%': {
                                transform: 'scale(1)'
                            },
                            '50%': {
                                transform: 'scale(1.05)'
                            },
                        }
                    }
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

        /* === Noise Grain Texture === */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* === Gradient Blobs === */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0.25;
            pointer-events: none;
        }

        /* === Navbar === */
        .navbar-glass {
            background: rgba(15, 10, 30, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(124, 58, 237, 0.15);
        }

        /* === Hero Gradient Text === */
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

        /* === Crescent Badge === */
        .ramadan-badge {
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.15), rgba(249, 115, 22, 0.05));
            border: 1px solid rgba(249, 115, 22, 0.35);
            animation: badge-pulse 2s ease-in-out infinite;
        }

        /* === Section Title Underline === */
        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #7C3AED, #F97316);
            border-radius: 2px;
            margin: 12px auto 0;
        }

        /* === Class Card === */
        .class-card {
            background: rgba(26, 16, 53, 0.7);
            border: 1px solid rgba(124, 58, 237, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .class-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.08) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.35s;
        }

        .class-card:hover {
            transform: translateY(-8px);
            border-color: rgba(124, 58, 237, 0.5);
            box-shadow: 0 20px 60px rgba(124, 58, 237, 0.2);
        }

        .class-card:hover::before {
            opacity: 1;
        }

        /* === CTA Button === */
        .btn-primary {
            background: linear-gradient(135deg, #7C3AED, #5B21B6);
            box-shadow: 0 8px 30px rgba(124, 58, 237, 0.35);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 40px rgba(124, 58, 237, 0.55);
        }

        .btn-outline {
            border: 1.5px solid rgba(124, 58, 237, 0.5);
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            border-color: #7C3AED;
            background: rgba(124, 58, 237, 0.1);
            transform: translateY(-2px);
        }

        /* === Feature Icon === */
        .icon-box {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.2), rgba(124, 58, 237, 0.05));
            border: 1px solid rgba(124, 58, 237, 0.25);
        }

        /* === Tag === */
        .tag-purple {
            background: rgba(124, 58, 237, 0.2);
            color: #C4B5FD;
            border: 1px solid rgba(124, 58, 237, 0.3);
        }

        .tag-orange {
            background: rgba(249, 115, 22, 0.15);
            color: #FDBA74;
            border: 1px solid rgba(249, 115, 22, 0.3);
        }

        .tag-green {
            background: rgba(16, 185, 129, 0.15);
            color: #6EE7B7;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        /* === Footer === */
        .footer-glass {
            background: rgba(15, 10, 30, 0.9);
            border-top: 1px solid rgba(124, 58, 237, 0.15);
        }

        /* === Progress bar === */
        .progress-bar {
            height: 4px;
            background: linear-gradient(90deg, #7C3AED, #F97316);
            border-radius: 2px;
        }
    </style>
</head>

<body class="font-sans antialiased min-h-screen">

    <!-- ============================================================
         NAVBAR
    ============================================================ -->
    <nav class="navbar-glass fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- Logo kiri -->
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
                    <a href="#home" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg text-sm font-medium transition-all duration-200">Home</a>
                    <a href="#kelas" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg text-sm font-medium transition-all duration-200">Kelas</a>
                </div>

                <!-- Tombol kanan -->
                <div class="flex items-center gap-3">
                    <a href="/login" class="btn-primary text-white text-sm font-semibold px-5 py-2.5 rounded-xl flex items-center gap-2">
                        <i class="ri-login-circle-line text-base"></i>
                        Masuk
                    </a>
                    <!-- Mobile hamburger -->
                    <button id="mobile-menu-btn" class="md:hidden text-slate-300 hover:text-white p-1.5 rounded-lg hover:bg-white/5 transition-colors">
                        <i class="ri-menu-3-line text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile menu dropdown -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-white/5 mt-2 pt-3 space-y-1">
                <a href="#home" class="block px-4 py-2.5 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg text-sm font-medium transition-all">Home</a>
                <a href="#kelas" class="block px-4 py-2.5 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg text-sm font-medium transition-all">Kelas</a>
            </div>
        </div>
    </nav>

    <!-- ============================================================
         HERO SECTION
    ============================================================ -->
    <section id="home" class="relative min-h-screen flex items-center overflow-hidden pt-16">

        <!-- Background blobs -->
        <div class="blob w-96 h-96 bg-primary top-10 -left-32"></div>
        <div class="blob w-80 h-80 bg-accent bottom-10 right-0"></div>
        <div class="blob w-64 h-64 bg-purple-800 top-1/2 left-1/2 -translate-x-1/2"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Left: Copy -->
                <div class="text-center lg:text-left">

                    <!-- Ramadan badge -->
                    <div class="inline-flex items-center gap-2 ramadan-badge px-4 py-2 rounded-full mb-6">
                        <span class="text-accent text-lg">☽</span>
                        <span class="text-orange-300 text-sm font-semibold tracking-wide">Spesial Ramadhan 2026</span>
                        <span class="text-accent text-lg">✨</span>
                    </div>

                    <!-- Headline -->
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight mb-4">
                        <span class="text-white">Jago Bikin</span><br>
                        <span class="gradient-text"> Web & Apps</span><br>
                        <span class="text-white">Selama </span>
                        <span class="gradient-text-accent">Ramadhan.</span>
                    </h1>

                    <p class="text-slate-400 text-lg leading-relaxed mb-8 max-w-lg mx-auto lg:mx-0">
                        Ubah waktu luang jadi peluang. Kuasai teknik <strong class="text-violet-400">Low-Code</strong> yang praktis hingga eksplorasi <strong class="text-violet-400">coding</strong> spesifik untuk solusi bisnis yang lebih powerful.
                    </p>

                    <!-- Feature chips -->
                    <div class="flex flex-wrap gap-2 justify-center lg:justify-start mb-8">
                        <!-- <span class="flex items-center gap-1.5 bg-white/5 border border-white/10 text-slate-300 text-xs font-medium px-3 py-1.5 rounded-full">
                            <i class="ri-award-line text-accent"></i> Sertifikat Digital
                        </span> -->
                        <span class="flex items-center gap-1.5 bg-white/5 border border-white/10 text-slate-300 text-xs font-medium px-3 py-1.5 rounded-full">
                            <i class="ri-live-line text-green-400"></i> Live Session
                        </span>
                        <span class="flex items-center gap-1.5 bg-white/5 border border-white/10 text-slate-300 text-xs font-medium px-3 py-1.5 rounded-full">
                            <i class="ri-telegram-line text-blue-500"></i> Grup Diskusi
                        </span>
                        <span class="flex items-center gap-1.5 bg-white/5 border border-white/10 text-slate-300 text-xs font-medium px-3 py-1.5 rounded-full">
                            <i class="ri-infinity-line text-violet-400"></i> Akses Seumur Hidup
                        </span>
                    </div>

                    <!-- CTAs -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#kelas" class="btn-primary text-white font-bold px-8 py-3.5 rounded-2xl flex items-center justify-center gap-2 text-base">
                            <i class="ri-rocket-line"></i>
                            Mulai Belajar
                        </a>
                        <a href="#kelas" class="btn-outline text-slate-300 font-semibold px-8 py-3.5 rounded-2xl flex items-center justify-center gap-2 text-base">
                            <i class="ri-play-circle-line text-accent"></i>
                            Lihat Kelas
                        </a>
                    </div>

                    <!-- Stats row -->
                    <!-- <div class="grid grid-cols-3 gap-4 mt-12 pt-8 border-t border-white/10">
                        <div class="text-center lg:text-left">
                            <div class="text-2xl font-extrabold text-white">500+</div>
                            <div class="text-slate-500 text-xs mt-0.5">Pelajar Aktif</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-2xl font-extrabold text-white">12</div>
                            <div class="text-slate-500 text-xs mt-0.5">Kelas Tersedia</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-2xl font-extrabold text-white">4.9 ⭐</div>
                            <div class="text-slate-500 text-xs mt-0.5">Rating Rata-rata</div>
                        </div>
                    </div> -->
                </div>

                <!-- Right: Hero Image -->
                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative w-full max-w-md">
                        <!-- Glow ring -->
                        <div class="absolute inset-0 rounded-3xl bg-primary/20 blur-3xl scale-110 animate-glow"></div>
                        <!-- Image card -->
                        <div class="relative rounded-3xl overflow-hidden border border-primary/30 shadow-2xl shadow-primary/20 animate-float">
                            <img src="/assets/images/hero-bukacoding.png" alt="BukaCoding Hero" class="w-full h-auto object-cover">
                            <!-- Overlay gradient bottom -->
                            <div class="absolute bottom-0 left-0 right-0 h-24 bg-gradient-to-t from-surface to-transparent"></div>
                        </div>

                        <!-- Floating badge 1 -->
                        <div class="absolute -top-4 -left-4 bg-card border border-primary/30 rounded-2xl px-4 py-2.5 shadow-xl flex items-center gap-2 animate-float-slow">
                            <div class="w-8 h-8 bg-green-500/20 rounded-xl flex items-center justify-center">
                                <i class="ri-checkbox-circle-fill text-green-400 text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white text-xs font-bold">Kurikulum Up-to-date</div>
                                <div class="text-slate-500 text-xs">2026 Edition</div>
                            </div>
                        </div>

                        <!-- Floating badge 2 -->
                        <div class="absolute -bottom-4 -right-4 bg-card border border-accent/30 rounded-2xl px-4 py-2.5 shadow-xl flex items-center gap-2" style="animation: float 7s ease-in-out infinite reverse;">
                            <div class="w-8 h-8 bg-accent/20 rounded-xl flex items-center justify-center">
                                <i class="ri-group-line text-accent text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white text-xs font-bold">Komunitas Aktif</div>
                                <div class="text-slate-500 text-xs">24/7 Support</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 opacity-50">
            <div class="text-slate-400 text-xs font-medium">Scroll ke bawah</div>
            <i class="ri-arrow-down-line text-slate-400 animate-bounce"></i>
        </div>
    </section>

    <!-- ============================================================
         BENEFITS / WHY SECTION
    ============================================================ -->
    <section class="relative py-24 overflow-hidden">
        <div class="blob w-72 h-72 bg-primary -right-20 top-10 opacity-15"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-14">
                <span class="tag-purple text-xs font-semibold px-4 py-1.5 rounded-full inline-block mb-4">Kenapa BukaCoding?</span>
                <h2 class="section-title text-3xl sm:text-4xl font-extrabold text-white">Belajar Cerdas,<br>Bukan Sekedar Belajar</h2>
            </div>

            <div class="grid sm:grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Benefit 1 -->
                <div class="class-card rounded-2xl p-6 text-center group">
                    <div class="icon-box w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="ri-code-box-line text-2xl text-violet-400"></i>
                    </div>
                    <h3 class="text-white font-bold mb-2">Modern & Flexible Development</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Pilih cara belajarmu. Gunakan pendekatan Low-Code untuk kecepatan, atau kuasai teknik coding spesifik untuk solusi data yang lebih kompleks.</p>
                </div>

                <!-- Benefit 2 -->
                <div class="class-card rounded-2xl p-6 text-center group">
                    <div class="icon-box w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="ri-timer-line text-2xl text-orange-400"></i>
                    </div>
                    <h3 class="text-white font-bold mb-2">Fleksibel & Santai</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Belajar kapan saja, di mana saja. Cocok dipadukan dengan ibadah Ramadhan yang padat.</p>
                </div>

                <!-- Benefit 3 -->
                <div class="class-card rounded-2xl p-6 text-center group">
                    <div class="icon-box w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="ri-projector-line text-2xl text-violet-400"></i>
                    </div>
                    <h3 class="text-white font-bold mb-2">Proyek Nyata</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Setiap kelas menghasilkan proyek yang bisa langsung kamu tampilkan di portofolio.</p>
                </div>

                <!-- Benefit 4 -->
                <!-- <div class="class-card rounded-2xl p-6 text-center group">
                    <div class="icon-box w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="ri-medal-line text-2xl text-yellow-400"></i>
                    </div>
                    <h3 class="text-white font-bold mb-2">Sertifikat Resmi</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Dapat sertifikat digital yang bisa kamu share ke LinkedIn atau lamaran kerja.</p>
                </div> -->
            </div>
        </div>
    </section>

    <!-- ============================================================
         KELAS SECTION
    ============================================================ -->
    <section id="kelas" class="relative py-24 overflow-hidden">
        <div class="blob w-96 h-96 bg-accent -left-24 bottom-0 opacity-10"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-14">
                <span class="tag-orange text-xs font-semibold px-4 py-1.5 rounded-full inline-block mb-4">Kelas Pilihan</span>
                <h2 class="section-title text-3xl sm:text-4xl font-extrabold text-white">Kelas Unggulan<br>Spesial Ramadhan</h2>
                <p class="text-slate-500 mt-4 max-w-xl mx-auto">Dipilih khusus untuk memaksimalkan 30 hari Ramadhan-mu menjadi momentum belajar yang produktif.</p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-7">

                <?php foreach ($kelas as $data): ?>
                    <!-- Class Card 1 -->
                    <div class="class-card rounded-3xl overflow-hidden group cursor-pointer">
                        <!-- Thumbnail -->
                        <div class="relative h-44 bg-gradient-to-br from-violet-900/60 to-purple-900/40 flex items-center justify-center">
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-card/60"></div>
                            <i class="ri-bubble-chart-line text-7xl text-violet-400/30"></i>
                            <div class="absolute top-3 left-3">
                                <span class="tag-purple text-xs font-bold px-2.5 py-1 rounded-lg"><?= $data->nama_kategori ?></span>
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="bg-green-500/20 text-green-400 border border-green-500/30 text-xs font-bold px-2.5 py-1 rounded-lg"><?= $data->harga == 0 ? 'Gratis' : 'Rp ' . number_format($data->harga, 0, ',', '.') ?></span>
                            </div>
                            <!-- <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="w-14 h-14 bg-primary/80 rounded-full flex items-center justify-center backdrop-blur-sm">
                                    <i class="ri-play-fill text-white text-2xl ml-1"></i>
                                </div>
                            </div> -->
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- <div class="flex gap-2 mb-3">
                            <span class="tag-orange text-xs px-2 py-0.5 rounded-md font-medium">Pemula</span>
                        </div> -->
                            <h3 class="text-white font-bold text-lg mb-2 group-hover:text-violet-300 transition-colors"><?= $data->nama; ?></h3>
                            <p class="text-slate-500 text-sm mb-4 leading-relaxed"><?= $data->deskripsi; ?></p>

                            <!-- Progress bar dummy -->
                            <!-- <div class="mb-4">
                            <div class="flex justify-between text-xs text-slate-500 mb-1.5">
                                <span>Progress</span>
                                <span>0%</span>
                            </div>
                            <div class="w-full h-1 bg-white/5 rounded-full">
                                <div class="progress-bar" style="width: 0%"></div>
                            </div>
                        </div> -->

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4 text-slate-500 text-xs">
                                    <span class="flex items-center gap-1"><i class="ri-video-line"></i> <?= $data->jumlah_materi; ?> Video</span>
                                    <!-- <span class="flex items-center gap-1"><i class="ri-time-line"></i> 3 Jam</span> -->
                                </div>
                                <a href="/login" class="btn-primary text-white text-xs font-semibold px-4 py-2 rounded-xl flex items-center gap-1.5" style="z-index: 9999">
                                    Daftar <i class="ri-arrow-right-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Lihat semua kelas button -->
            <div class="text-center mt-10">
                <a href="/login" class="btn-outline text-slate-300 font-semibold px-8 py-3.5 rounded-2xl inline-flex items-center gap-2">
                    <i class="ri-layout-grid-line"></i>
                    Lihat Semua Kelas
                </a>
            </div>
        </div>
    </section>

    <!-- ============================================================
         CTA BANNER
    ============================================================ -->
    <section class="relative py-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="relative rounded-3xl overflow-hidden">
                <!-- Background gradient -->
                <div class="absolute inset-0 bg-gradient-to-br from-primary via-purple-800 to-primary-dark"></div>
                <!-- Pattern overlay -->
                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 28px 28px;"></div>
                <!-- Blobs -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-accent/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full blur-3xl"></div>

                <div class="relative z-10 text-center py-16 px-6 md:px-16">
                    <span class="inline-flex items-center gap-2 bg-white/10 border border-white/20 text-white text-sm font-semibold px-4 py-1.5 rounded-full mb-6">
                        ☽ Penawaran Terbatas Ramadhan
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 leading-tight">
                        Gabung Sekarang &<br>Raih Skill Baru!
                    </h2>
                    <p class="text-violet-200 text-lg mb-8 max-w-xl mx-auto">
                        Daftar hari ini dan nikmati akses ke semua kelas pilihan Ramadhan dengan harga spesial.
                    </p>
                    <a href="/register" class="inline-flex items-center gap-2 bg-white text-primary font-extrabold px-10 py-4 rounded-2xl hover:bg-violet-50 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-white/20 text-lg">
                        <i class="ri-user-add-line"></i>
                        Daftar Gratis Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================
         FOOTER
    ============================================================ -->
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

    <!-- ============================================================
         SCRIPTS
    ============================================================ -->
    <script>
        // Mobile menu toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Close mobile menu on link click
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => menu.classList.add('hidden'));
        });

        // Navbar scroll effect
        const navbar = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 20) {
                navbar.classList.add('shadow-xl', 'shadow-primary/10');
            } else {
                navbar.classList.remove('shadow-xl', 'shadow-primary/10');
            }
        });

        // Intersection Observer for staggered card animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    entry.target.style.transitionDelay = `${i * 80}ms`;
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.class-card').forEach(card => {
            card.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700');
            observer.observe(card);
        });
    </script>

</body>

</html>