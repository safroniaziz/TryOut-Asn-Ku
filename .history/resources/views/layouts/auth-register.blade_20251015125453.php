<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TryOut ASNku') }} - Platform Revolusioner Persiapan CPNS & PPPK</title>
    <meta name="description" content="Platform tryout online paling canggih di Indonesia. 50,000+ soal premium, sistem analisis canggih, dan pembelajaran terpersonalisasi untuk memastikan kesuksesan CPNS & PPPK Anda.">

    <!-- Advanced Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Premium Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 25%, #3b82f6 50%, #f97316 75%, #ea580c 100%);
        }

        .floating-animation {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .text-gradient {
            background: linear-gradient(45deg, #3b82f6, #f97316);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Compact Register Form Styles */
        .register-form .form-group {
            margin-bottom: 1rem;
        }

        .register-form .form-input {
            padding: 0.625rem 0.75rem 0.625rem 2.25rem;
            font-size: 0.875rem;
            border-radius: 0.5rem;
        }

        .register-form .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.25rem;
        }

        .register-form .form-icon {
            font-size: 0.875rem;
            padding-left: 0.75rem;
        }

        .register-form .error-text {
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        /* 2-column grid for register form */
        .register-form .form-grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        /* Professional Elements */
        .professional-shadow {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .professional-glow {
            box-shadow: 0 0 0 1px rgba(59, 130, 246, 0.1), 0 0 0 4px rgba(59, 130, 246, 0.05);
        }

        .professional-hover-lift {
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .professional-hover-lift:hover {
            transform: translateY(-8px);
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .backdrop-blur-professional {
            backdrop-filter: blur(20px) saturate(180%);
        }

        /* Enhanced Animations */
        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-pulse-soft {
            animation: pulseSoft 2s ease-in-out infinite;
        }

        @keyframes pulseSoft {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }

        /* Modern Form Styling */
        .modern-input {
            background: linear-gradient(145deg, #f8fafc, #f1f5f9);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .modern-input:focus {
            background: #ffffff;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }

        .modern-button {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            transition: all 0.3s ease;
            transform: translateY(0);
        }

        .modern-button:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }

        /* Advanced Typography */
        .font-display {
            font-family: 'Sora', sans-serif;
        }

        .font-body {
            font-family: 'Inter', sans-serif;
        }

        /* Responsive Design Enhancements */
        @media (max-width: 768px) {
            .register-form .form-grid-2 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body class="font-body antialiased bg-gray-100 text-gray-900">
    <div class="min-h-screen">
        @yield('content')
    </div>
</body>
</html>
