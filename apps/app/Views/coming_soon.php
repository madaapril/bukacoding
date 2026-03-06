<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon - Dikedai</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: '#56a7fe',
                        'brand-dark': '#3a8ee6',
                        'bg-body': '#f8fafc',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon">

    <style>
        body {
            background-color: #f8fafc;
            background-image: radial-gradient(#e2e8f0 0.5px, transparent 0.5px);
            background-size: 24px 24px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }

        .gradient-text {
            background: linear-gradient(135deg, #56a7fe 0%, #3a8ee6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }
    </style>
</head>

<body class="font-sans antialiased text-slate-700 min-h-screen flex items-center justify-center p-6">
    <div class="max-w-2xl w-full text-center animate__animated animate__zoomIn">
        <!-- Logo/Icon -->
        <div class="mb-8 flex justify-center">
            <div class="w-16 h-16 bg-brand rounded-2xl flex items-center justify-center text-white shadow-lg shadow-brand/20 animate__animated animate__bounceIn">
                <i class="ri-store-2-line text-3xl"></i>
            </div>
        </div>

        <!-- Glass Card Content -->
        <div class="glass-card rounded-[2.5rem] p-10 md:p-16 relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-brand/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-brand/10 rounded-full blur-2xl"></div>

            <h1 class="text-3xl md:text-5xl pb-2 font-bold mb-4 gradient-text">
                Sedang Disiapkan
            </h1>

            <p class="text-md md:text-lg text-slate-500 mb-10 leading-relaxed">
                Kami sedang meramu sesuatu yang luar biasa untuk mengoptimalkan operasional kedai Anda. Fitur ini akan segera hadir!
            </p>

            <!-- Status Indicator -->
            <div class="flex items-center justify-center gap-3 mb-10">
                <span class="flex h-3 w-3 relative">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-brand"></span>
                </span>
                <span class="text-sm font-semibold tracking-wider uppercase text-brand">Pengerjaan Intensif</span>
            </div>

            <!-- Action Button -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="https://dikedai.my.id" class="bg-brand hover:bg-brand-dark text-white px-4 md:px-8 py-2 md:py-4 rounded-full font-semibold transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl hover:shadow-brand/20 flex items-center justify-center gap-2">
                    <i class="ri-arrow-left-line"></i>
                    Kembali
                </a>
                <button onclick="window.location.reload()" class="bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 px-4 md:px-8 py-2 md:py-4 rounded-full font-semibold transition-all duration-300 flex items-center justify-center gap-2">
                    <i class="ri-refresh-line"></i>
                    Cek Pembaruan
                </button>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="mt-12 text-slate-400 text-sm animate__animated animate__fadeIn animate__delay-1s">
            <p>&copy; <?= date('Y') ?> DIKEDAI. All rights reserved.</p>
        </div>
    </div>
</body>

</html>