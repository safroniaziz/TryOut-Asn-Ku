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
            background: #1e293b;
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

        /* Enhanced Professional Elements */
        .premium-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            transition: all 0.3s ease;
        }

        .premium-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.12);
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
        }

        .glow-effect {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease;
        }

        .glow-effect:hover {
            box-shadow: 0 0 30px rgba(249, 115, 22, 0.4);
        }

        .enhanced-button {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8, #f97316);
            background-size: 200% 200%;
            animation: buttonGradient 3s ease infinite;
            position: relative;
            overflow: hidden;
        }

        .enhanced-button::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #3b82f6, #f97316, #3b82f6);
            z-index: -1;
            border-radius: inherit;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .enhanced-button:hover::before {
            opacity: 1;
        }

        @keyframes buttonGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Spectacular Animation Effects */
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(-25%); animation-timing-function: cubic-bezier(0.8, 0, 1, 1); }
            50% { transform: translateY(0); animation-timing-function: cubic-bezier(0, 0, 0.2, 1); }
        }

        @keyframes glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3),
                           0 0 40px rgba(59, 130, 246, 0.1),
                           0 0 60px rgba(59, 130, 246, 0.05);
            }
            50% {
                box-shadow: 0 0 30px rgba(249, 115, 22, 0.4),
                           0 0 60px rgba(249, 115, 22, 0.2),
                           0 0 90px rgba(249, 115, 22, 0.1);
            }
        }

        .glow-animation {
            animation: glow 3s ease-in-out infinite;
        }

        /* Particle floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-20px) rotate(120deg); }
            66% { transform: translateY(10px) rotate(240deg); }
        }

        .floating-particle {
            animation-duration: 3s;
            animation-iteration-count: infinite;
        }

        .floating-particle:nth-child(1) {
            animation: float 4s ease-in-out infinite;
            animation-delay: 0s;
        }

        .floating-particle:nth-child(2) {
            animation: float 3s ease-in-out infinite;
            animation-delay: 1s;
        }

        .floating-particle:nth-child(3) {
            animation: float 5s ease-in-out infinite;
            animation-delay: 2s;
        }

        /* Professional Auth Specific Styles */
        .auth-background {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 25%, #312e81 50%, #1e40af 75%, #0369a1 100%);
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
        }

        .spectacular-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .input-glow:focus {
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.15),
                        0 0 20px rgba(139, 92, 246, 0.2);
        }

        .button-spectacular {
            background: linear-gradient(135deg, #8b5cf6, #3b82f6, #06b6d4);
            background-size: 200% 200%;
            animation: buttonGradient 3s ease infinite;
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.3);
        }

        .button-spectacular:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 40px rgba(139, 92, 246, 0.4);
        }
    </style>
</head>
<body class="font-inter antialiased h-full overflow-x-hidden">
    @yield('content')

    <script>
        // Enhanced interactive effects for auth pages
        document.addEventListener('DOMContentLoaded', function() {
            // Add floating animation to background orbs
            const orbs = document.querySelectorAll('.floating-animation');
            orbs.forEach((orb, index) => {
                orb.style.animationDelay = `${index * 0.5}s`;
            });

            // Enhanced form interactions
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                    this.parentElement.style.transition = 'transform 0.3s ease';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });

            // Button hover effects
            const buttons = document.querySelectorAll('button[type="submit"]');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05) translateY(-2px)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1) translateY(0)';
                });
            });

            // Parallax effect for floating particles
            window.addEventListener('scroll', () => {
                const particles = document.querySelectorAll('.floating-particle');
                const scrolled = window.pageYOffset;

                particles.forEach((particle, index) => {
                    const speed = 0.5 + (index * 0.2);
                    particle.style.transform = `translateY(${scrolled * speed}px)`;
                });
            });

            // Add typing animation effect
            const labels = document.querySelectorAll('label');
            labels.forEach(label => {
                label.addEventListener('click', function() {
                    const input = document.getElementById(this.getAttribute('for'));
                    if (input) {
                        input.focus();
                        input.style.borderColor = '#8b5cf6';
                        setTimeout(() => {
                            input.style.borderColor = '';
                        }, 2000);
                    }
                });
            });
        });
    </script>
</body>
</html>
