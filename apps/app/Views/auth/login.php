<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | BukaCoding</title>
    <meta name="description" content="Masuk ke akun BukaCoding Anda dan mulai belajar Low-Code hari ini.">

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
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 9s ease-in-out infinite',
                        'glow': 'glow 3s ease-in-out infinite',
                        'fade-in-up': 'fadeInUp 0.6s ease forwards',
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
                        fadeInUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(24px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
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
            min-height: 100vh;
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

        /* === Gradient Text === */
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

        /* === Login Card === */
        .login-card {
            background: rgba(26, 16, 53, 0.75);
            border: 1px solid rgba(124, 58, 237, 0.2);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* === Input Field === */
        .input-field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(124, 58, 237, 0.25);
            color: #E2E8F0;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: #7C3AED;
            background: rgba(124, 58, 237, 0.08);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.15);
        }

        .input-field::placeholder {
            color: #475569;
        }

        .input-icon {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(124, 58, 237, 0.25);
            border-right: none;
            color: #64748B;
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

        /* === Navbar glass === */
        .navbar-glass {
            background: rgba(15, 10, 30, 0.75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(124, 58, 237, 0.15);
        }

        /* === Footer === */
        .footer-glass {
            background: rgba(15, 10, 30, 0.9);
            border-top: 1px solid rgba(124, 58, 237, 0.15);
        }
    </style>
</head>

<body class="font-sans antialiased">

    <!-- ============================================================
         NAVBAR
    ============================================================ -->
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

                <!-- Nav links -->
                <div class="hidden md:flex items-center gap-1">
                    <a href="/#home" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg text-sm font-medium transition-all duration-200">Home</a>
                    <a href="/#kelas" class="px-4 py-2 text-slate-300 hover:text-white hover:bg-white/5 rounded-lg text-sm font-medium transition-all duration-200">Kelas</a>
                </div>

                <!-- Register link -->
                <a href="<?= base_url('register') ?>" class="hidden sm:flex items-center gap-2 text-slate-300 hover:text-white hover:bg-white/5 border border-white/10 hover:border-primary/40 px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200">
                    <i class="ri-user-add-line text-accent"></i>
                    Daftar Gratis
                </a>
            </div>
        </div>
    </nav>

    <!-- ============================================================
         LOGIN SECTION
    ============================================================ -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-16 pb-10">

        <!-- Background blobs -->
        <div class="blob w-96 h-96 bg-primary top-10 -left-32"></div>
        <div class="blob w-80 h-80 bg-accent bottom-10 right-0"></div>
        <div class="blob w-64 h-64 bg-purple-800 top-1/2 left-1/2 -translate-x-1/2"></div>

        <div class="relative z-10 w-full max-w-md px-4 animate-fade-in-up">

            <!-- Logo mark above card -->
            <div class="flex flex-col items-center mb-8">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-primary to-accent flex items-center justify-center shadow-xl shadow-primary/30 animate-glow mb-3">
                    <i class="ri-code-s-slash-line text-white text-2xl"></i>
                </div>
                <h1 class="text-white font-extrabold text-2xl tracking-tight">
                    Buka<span class="gradient-text-accent">Coding</span>
                </h1>
                <p class="text-slate-500 text-sm mt-1">Platform kelas Low-Code terbaik</p>
            </div>

            <!-- Login Card -->
            <div class="login-card rounded-3xl p-8">

                <h2 class="text-white font-extrabold text-2xl mb-1">Selamat Datang! 👋</h2>
                <p class="text-slate-500 text-sm mb-7">Silakan masuk ke akun BukaCoding Anda</p>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="flex items-center gap-3 bg-green-500/10 border border-green-500/30 text-green-400 text-sm px-4 py-3 rounded-xl mb-6">
                        <i class="ri-checkbox-circle-line text-lg flex-shrink-0"></i>
                        <span><?= session()->getFlashdata('success') ?></span>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="flex items-center gap-3 bg-red-500/10 border border-red-500/30 text-red-400 text-sm px-4 py-3 rounded-xl mb-6">
                        <i class="ri-error-warning-line text-lg flex-shrink-0"></i>
                        <span><?= session()->getFlashdata('error') ?></span>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="POST" class="space-y-5">
                    <?= csrf_field() ?>

                    <!-- Email -->
                    <div>
                        <label class="block text-slate-300 text-sm font-semibold mb-2">Alamat Email</label>
                        <div class="flex">
                            <span class="input-icon flex items-center justify-center px-3.5 rounded-l-xl">
                                <i class="ri-mail-line text-slate-500"></i>
                            </span>
                            <input
                                type="email"
                                name="email"
                                class="input-field flex-1 px-4 py-3 rounded-r-xl text-sm w-full"
                                placeholder="nama@email.com"
                                value="<?= isset($_COOKIE['eid']) ? unserialize(base64_decode($_COOKIE['eid'])) : ''; ?>"
                                required
                                autofocus
                                value="<?= old('email') ?>">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-slate-300 text-sm font-semibold">Kata Sandi</label>
                            <!-- <a href="<?= base_url('forgot-password') ?>" class="text-violet-400 text-xs hover:text-violet-300 transition-colors">Lupa Sandi?</a> -->
                        </div>
                        <div class="flex">
                            <span class="input-icon flex items-center justify-center px-3.5 rounded-l-xl">
                                <i class="ri-lock-2-line text-slate-500"></i>
                            </span>
                            <input
                                type="password"
                                name="password"
                                id="passwordInput"
                                class="input-field flex-1 px-4 py-3 text-sm w-full"
                                placeholder="••••••••"
                                value="<?= isset($_COOKIE['pid']) ? unserialize(base64_decode($_COOKIE['pid'])) : ''; ?>"
                                required>
                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="input-icon flex items-center justify-center px-3.5 rounded-r-xl border-l-0 cursor-pointer hover:text-slate-300 transition-colors"
                                tabindex="-1">
                                <i class="ri-eye-off-line text-slate-500" id="eyeIcon"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember me -->
                    <div class="flex items-center gap-3">
                        <label class="relative inline-flex items-center cursor-pointer select-none group" for="rememberMe">
                            <input
                                type="checkbox"
                                id="rememberMe"
                                name="rememberme"
                                <?= isset($_COOKIE['eid']) ? 'checked' : ''; ?>
                                class="sr-only peer">
                            <!-- Track -->
                            <div class="w-10 h-5 rounded-full bg-white/10 border border-white/10 peer-checked:bg-violet-600 peer-checked:border-violet-500 transition-all duration-300 shadow-inner"></div>
                            <!-- Thumb -->
                            <div class="absolute left-0.5 top-0.5 w-4 h-4 rounded-full bg-slate-400 peer-checked:bg-white peer-checked:translate-x-5 transition-all duration-300 shadow-md peer-checked:shadow-violet-500/40"></div>
                        </label>
                        <label for="rememberMe" class="text-slate-400 text-sm cursor-pointer select-none hover:text-slate-300 transition-colors duration-200">
                            <i class="ri-shield-check-line text-xs mr-1 text-violet-400 peer-checked:text-violet-300"></i>Ingat saya
                        </label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn-primary w-full text-white font-bold py-3.5 rounded-xl flex items-center justify-center gap-2 text-base mt-2">
                        <i class="ri-login-circle-line text-lg"></i>
                        Masuk Sekarang
                    </button>

                    <!-- Register link -->
                    <p class="text-center text-slate-500 text-sm pt-1">
                        Belum punya akun?
                        <a href="<?= base_url('register') ?>" class="text-violet-400 font-bold hover:text-violet-300 transition-colors">Daftar Gratis</a>
                    </p>
                </form>
            </div>

            <!-- Back to home -->
            <p class="text-center mt-6">
                <a href="/" class="inline-flex items-center gap-1.5 text-slate-500 hover:text-slate-300 text-sm transition-colors">
                    <i class="ri-arrow-left-line"></i>
                    Kembali ke Beranda
                </a>
            </p>
        </div>
    </section>

    <!-- ============================================================
         FOOTER
    ============================================================ -->
    <footer class="footer-glass relative z-10 py-6">
        <p class="text-center text-slate-600 text-xs">
            &copy; <?= date('Y') ?> BukaCoding. All rights reserved.
        </p>
    </footer>

    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'ri-eye-line text-slate-500';
            } else {
                input.type = 'password';
                icon.className = 'ri-eye-off-line text-slate-500';
            }
        }
    </script>

</body>

</html>