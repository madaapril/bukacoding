<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= lang('Errors.pageNotFound') ?> - BukaCoding</title>

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
                        'glow': 'glow 3s ease-in-out infinite',
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
    </style>
</head>

<body class="font-sans antialiased min-h-screen flex items-center justify-center relative overflow-hidden">
    <!-- Background blobs -->
    <div class="blob w-96 h-96 bg-primary top-10 -left-32"></div>
    <div class="blob w-80 h-80 bg-accent bottom-10 right-0"></div>
    <div class="blob w-64 h-64 bg-purple-800 top-1/2 left-1/2 -translate-x-1/2"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <!-- Error Code -->
        <div class="relative inline-block mb-6">
            <div class="absolute inset-0 rounded-3xl bg-primary/20 blur-3xl scale-110 animate-glow"></div>
            <h1 class="relative text-7xl sm:text-9xl font-extrabold gradient-text leading-tight drop-shadow-2xl animate-float">
                404
            </h1>
        </div>

        <!-- Error Message -->
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">
            Oops! Halaman Tidak Ditemukan.
        </h2>

        <div class="text-slate-400 text-lg leading-relaxed mb-10 max-w-lg mx-auto bg-card/60 backdrop-blur-md border border-primary/20 p-6 rounded-2xl shadow-xl">
            <?php if (ENVIRONMENT !== 'production') : ?>
                <p class="font-mono text-sm text-left text-pink-400 break-words"><?= nl2br(esc($message)) ?></p>
            <?php else : ?>
                <p><?= lang('Errors.sorryCannotFind') ?></p>
            <?php endif; ?>
        </div>

        <!-- Call to Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/" class="btn-primary text-white font-bold px-8 py-3.5 rounded-2xl flex items-center justify-center gap-2 text-base">
                <i class="ri-home-smile-line text-lg"></i>
                Kembali ke Beranda
            </a>
            <button onclick="history.back()" class="btn-outline text-slate-300 font-semibold px-8 py-3.5 rounded-2xl flex items-center justify-center gap-2 text-base">
                <i class="ri-arrow-go-back-line text-lg"></i>
                Kembali Sebelumnya
            </button>
        </div>
    </div>
</body>

</html>