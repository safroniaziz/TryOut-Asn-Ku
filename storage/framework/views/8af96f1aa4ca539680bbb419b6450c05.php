<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        
        <?php echo $__env->yieldPushContent('seo-meta'); ?>

        
        <?php if(trim($__env->yieldContent('seo-meta')) === ''): ?>
        <title><?php echo e(config('app.name', 'TryOut ASNku')); ?> - <?php echo e($title ?? 'Platform Latihan CPNS & PPPK Terbaik'); ?></title>
        <?php endif; ?>

        
        <?php echo $__env->yieldPushContent('structured-data'); ?>

        <!-- Premium Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- Premium Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <!-- Bootstrap CSS for modals -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Custom Toast Notifications CSS -->
        <style>
            .custom-toast {
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                min-width: 300px;
                max-width: 400px;
                animation: slideInRight 0.3s ease-out;
            }

            .custom-toast.fade-out {
                animation: slideOutRight 0.3s ease-out forwards;
            }

            @keyframes slideInRight {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }

            @keyframes slideOutRight {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }

            .toast-success {
                background: linear-gradient(135deg, #10b981 0%, #059669 100%);
                color: white;
                border-radius: 12px;
                padding: 16px 20px;
                box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
                border-left: 4px solid #34d399;
            }

            .toast-error {
                background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
                color: white;
                border-radius: 12px;
                padding: 16px 20px;
                box-shadow: 0 10px 25px rgba(239, 68, 68, 0.3);
                border-left: 4px solid #f87171;
            }

            .toast-warning {
                background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
                color: white;
                border-radius: 12px;
                padding: 16px 20px;
                box-shadow: 0 10px 25px rgba(245, 158, 11, 0.3);
                border-left: 4px solid #fbbf24;
            }

            .toast-info {
                background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
                color: white;
                border-radius: 12px;
                padding: 16px 20px;
                box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
                border-left: 4px solid #60a5fa;
            }

            .toast-content {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .toast-icon {
                width: 24px;
                height: 24px;
                flex-shrink: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .toast-text {
                flex: 1;
            }

            .toast-title {
                font-weight: 600;
                font-size: 14px;
                margin-bottom: 2px;
            }

            .toast-message {
                font-size: 13px;
                opacity: 0.9;
                line-height: 1.4;
            }

            .toast-close {
                cursor: pointer;
                opacity: 0.7;
                transition: opacity 0.2s;
                padding: 4px;
            }

            .toast-close:hover {
                opacity: 1;
            }

            .toast-progress {
                position: absolute;
                bottom: 0;
                left: 0;
                height: 3px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 0 0 12px 12px;
                transition: width linear;
            }
        </style>

        <!-- Elegant & Professional Custom Styles -->
        <style>
            :root {
                --color-primary: #3b82f6; /* vibrant blue-500 */
                --color-secondary: #10b981; /* emerald-500 */
                --color-accent: #8b5cf6; /* violet-500 */
                --color-warning: #f59e0b; /* amber-500 */
                --color-pink: #ec4899; /* pink-500 */
                --gradient-primary: linear-gradient(135deg, #3b82f6, #1d4ed8);
                --gradient-secondary: linear-gradient(135deg, #10b981, #059669);
                --gradient-accent: linear-gradient(135deg, #8b5cf6, #7c3aed);
                --gradient-hero: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                --gray-50: #f9fafb;
                --gray-100: #f3f4f6;
                --gray-200: #e5e7eb;
                --gray-300: #d1d5db;
                --gray-400: #9ca3af;
                --gray-500: #6b7280;
                --gray-600: #4b5563;
                --gray-700: #374151;
                --gray-800: #1f2937;
                --gray-900: #111827;
            }

            /* Elegant Professional Background */
            body {
                background: linear-gradient(to bottom, #ffffff, #fafbff);
                min-height: 100vh;
            }

            /* Sophisticated Animations */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slideInLeft {
                from {
                    opacity: 0;
                    transform: translateX(-20px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes scaleIn {
                from {
                    opacity: 0;
                    transform: scale(0.95);
                }
                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-6px); }
            }

            @keyframes shimmer {
                0% { background-position: -1000px 0; }
                100% { background-position: 1000px 0; }
            }

            @keyframes pulse {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.05); }
            }

            /* Animation Classes */
            .animate-fade-in-up {
                animation: fadeInUp 0.6s ease-out forwards;
            }

            .animate-slide-in-left {
                animation: slideInLeft 0.6s ease-out forwards;
            }

            .animate-scale-in {
                animation: scaleIn 0.4s ease-out forwards;
            }

            .animate-float {
                animation: float 3s ease-in-out infinite;
            }

            .animate-shimmer {
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
                background-size: 1000px 100%;
                animation: shimmer 2s infinite;
            }

            .animate-pulse-slow {
                animation: pulse 2s ease-in-out infinite;
            }

            /* Delay Classes for Staggered Animations */
            .delay-100 { animation-delay: 0.1s; opacity: 0; }
            .delay-200 { animation-delay: 0.2s; opacity: 0; }
            .delay-300 { animation-delay: 0.3s; opacity: 0; }
            .delay-400 { animation-delay: 0.4s; opacity: 0; }
            .delay-500 { animation-delay: 0.5s; opacity: 0; }

            /* Premium Cards for Professional Look */
            .dashboard-card {
                background: #ffffff;
                border-radius: 16px;
                padding: 28px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                border: 1px solid #f3f4f6;
                transition: all 0.2s ease;
            }

            .dashboard-card:hover {
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                transform: translateY(-2px);
            }

            .stats-card {
                background: #ffffff;
                border-radius: 16px;
                padding: 28px;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                border: 1px solid #f3f4f6;
                transition: all 0.2s ease;
            }

            .stats-card:hover {
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                transform: translateY(-2px);
            }

            .package-card {
                background: linear-gradient(135deg, #ffffff, #fafbff);
                border-radius: 20px;
                padding: 32px;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                border: 1px solid #e5e7eb;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
            }

            .package-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
                transition: left 0.6s;
            }

            .package-card:hover::before {
                left: 100%;
            }

            .package-card:hover {
                transform: translateY(-8px) scale(1.02);
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            }

            .package-card.cpns:hover {
                border-color: #3b82f6;
                box-shadow: 0 25px 50px -12px rgba(59, 130, 246, 0.25);
            }

            .package-card.pppk:hover {
                border-color: #10b981;
                box-shadow: 0 25px 50px -12px rgba(16, 185, 129, 0.25);
            }

            /* Gradient Card Variants */
            .dashboard-card-gradient-primary {
                background: var(--gradient-primary);
                color: white;
                border: none;
            }

            .dashboard-card-gradient-secondary {
                background: var(--gradient-secondary);
                color: white;
                border: none;
            }

            .dashboard-card-gradient-accent {
                background: var(--gradient-accent);
                color: white;
                border: none;
            }

            .dashboard-card-gradient-hero {
                background: var(--gradient-hero);
                color: white;
                border: none;
            }

            /* Elegant Button Styles */
            .btn-primary {
                background: var(--gradient-primary);
                color: white;
                border: none;
                border-radius: 12px;
                padding: 12px 24px;
                font-weight: 600;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
            }

            .btn-primary::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                transition: left 0.5s;
            }

            .btn-primary:hover::before {
                left: 100%;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
            }

            .btn-secondary {
                background: white;
                color: var(--gray-700);
                border: 2px solid var(--gray-200);
                border-radius: 12px;
                padding: 10px 22px;
                font-weight: 600;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .btn-secondary:hover {
                background: var(--gray-50);
                border-color: var(--color-primary);
                color: var(--color-primary);
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            }

            .btn-accent {
                background: linear-gradient(135deg, #3b82f6, #2563eb, #1d4ed8);
                color: white;
                border: none;
                border-radius: 12px;
                padding: 12px 28px;
                font-weight: 700;
                font-size: 16px;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 4px 14px 0 rgba(59, 130, 246, 0.3);
                position: relative;
                overflow: hidden;
            }

            .btn-accent::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                transition: left 0.6s;
            }

            .btn-accent:hover::before {
                left: 100%;
            }

            .btn-accent:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(59, 130, 246, 0.4);
            }

            /* Premium CTA Buttons */
            .btn-primary-premium {
                background: linear-gradient(135deg, #3b82f6, #2563eb);
                color: white;
                border: none;
                border-radius: 16px;
                padding: 16px 32px;
                font-weight: 700;
                font-size: 18px;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
                display: inline-flex;
                align-items: center;
                gap: 12px;
            }

            .btn-primary-premium:hover {
                transform: translateY(-3px);
                box-shadow: 0 12px 30px rgba(59, 130, 246, 0.4);
                background: linear-gradient(135deg, #2563eb, #1d4ed8);
            }

            .btn-success-premium {
                background: linear-gradient(135deg, #10b981, #059669);
                color: white;
                border: none;
                border-radius: 16px;
                padding: 16px 32px;
                font-weight: 700;
                font-size: 18px;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3);
                display: inline-flex;
                align-items: center;
                gap: 12px;
            }

            .btn-success-premium:hover {
                transform: translateY(-3px);
                box-shadow: 0 12px 30px rgba(16, 185, 129, 0.4);
                background: linear-gradient(135deg, #059669, #047857);
            }

            /* Elegant Badge Styles */
            .badge-success {
                background: #f0fdf4;
                color: #166534;
                padding: 4px 12px;
                border-radius: 6px;
                font-size: 12px;
                font-weight: 600;
            }

            .badge-warning {
                background: #fffbeb;
                color: #92400e;
                padding: 4px 12px;
                border-radius: 6px;
                font-size: 12px;
                font-weight: 600;
            }

            .badge-info {
                background: #f0f9ff;
                color: #1e40af;
                padding: 4px 12px;
                border-radius: 6px;
                font-size: 12px;
                font-weight: 600;
            }

            .badge-accent {
                background: var(--gradient-accent);
                color: white;
                padding: 6px 16px;
                border-radius: 9999px;
                font-size: 12px;
                font-weight: 700;
                box-shadow: 0 2px 4px rgba(139, 92, 246, 0.3);
            }

            /* Elegant Progress Bar Styles */
            .progress-bar {
                background: var(--gray-200);
                border-radius: 9999px;
                height: 10px;
                overflow: hidden;
                position: relative;
            }

            .progress-fill {
                background: var(--gradient-primary);
                height: 100%;
                border-radius: 9999px;
                transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);
                position: relative;
                overflow: hidden;
            }

            .progress-fill::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
                animation: shimmer 2s infinite;
            }

            /* Professional Icons with Clean Backgrounds */
            .stats-icon {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 56px;
                height: 56px;
                border-radius: 14px;
                font-size: 24px;
                margin-bottom: 20px;
            }

            .stats-icon-primary {
                background: linear-gradient(135deg, #3b82f6, #2563eb);
                color: white;
            }

            .stats-icon-success {
                background: linear-gradient(135deg, #10b981, #059669);
                color: white;
            }

            .stats-icon-warning {
                background: linear-gradient(135deg, #f59e0b, #d97706);
                color: white;
            }

            .stats-icon-violet {
                background: linear-gradient(135deg, #8b5cf6, #7c3aed);
                color: white;
            }

            .package-icon {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 56px;
                height: 56px;
                border-radius: 14px;
                font-size: 24px;
                margin-bottom: 20px;
            }

            .package-icon.cpns {
                background: linear-gradient(135deg, #3b82f6, #2563eb);
                color: white;
            }

            .package-icon.pppk {
                background: linear-gradient(135deg, #10b981, #059669);
                color: white;
            }

            /* Professional Typography */
            .text-title {
                font-size: 32px;
                font-weight: 800;
                color: #1f2937;
                line-height: 1.2;
            }

            .text-subtitle {
                font-size: 18px;
                font-weight: 500;
                color: #6b7280;
                line-height: 1.5;
            }

            .text-card-title {
                font-size: 14px;
                font-weight: 600;
                color: #6b7280;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                margin-bottom: 12px;
            }

            .text-stat-number {
                font-size: 42px;
                font-weight: 800;
                line-height: 1;
                color: #1f2937;
            }

            .text-stat-label {
                font-size: 14px;
                font-weight: 500;
                color: #6b7280;
            }

            /* Package titles */
            .package-title {
                font-size: 20px;
                font-weight: 700;
                color: #1f2937;
                line-height: 1.3;
                margin-bottom: 20px;
            }

            .text-stat-label {
                font-size: 14px;
                color: var(--gray-500);
                margin-top: 4px;
            }

            /* Clean Grid Layout */
            .dashboard-grid {
                display: grid;
                gap: 24px;
            }

            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 20px;
            }

            /* Professional Section Spacing */
            .section {
                margin-bottom: 32px;
            }

            .section-header {
                margin-bottom: 20px;
            }

            .section-title {
                font-size: 20px;
                font-weight: 600;
                color: var(--gray-900);
                margin-bottom: 8px;
            }

            .section-description {
                font-size: 14px;
                color: var(--gray-600);
            }

            /* List Styles */
            .list-item {
                padding: 12px 16px;
                border-bottom: 1px solid var(--gray-100);
                transition: background-color 0.2s ease;
            }

            .list-item:hover {
                background: var(--gray-50);
            }

            .list-item:last-child {
                border-bottom: none;
            }

            /* Smooth scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
                height: 8px;
            }

            ::-webkit-scrollbar-track {
                background: var(--gray-100);
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb {
                background: var(--gray-400);
                border-radius: 4px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: var(--gray-500);
            }

            /* Smooth scrollbar */
            ::-webkit-scrollbar {
                width: 10px;
                height: 10px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
                background: linear-gradient(180deg, #3b82f6, #8b5cf6);
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: linear-gradient(180deg, #2563eb, #7c3aed);
            }

            /* Fix underline issues for links and buttons */
            a, button, .btn, [class*="btn-"] {
                text-decoration: none !important;
            }

            a:hover, button:hover, .btn:hover, [class*="btn-"]:hover {
                text-decoration: none !important;
            }

            /* Ensure no underlines on navigation links */
            .nav-link, .nav a, [class*="nav-"] a {
                text-decoration: none !important;
            }

            /* Remove underlines from all interactive elements */
            [role="button"], [role="link"], input[type="submit"], input[type="button"] {
                text-decoration: none !important;
            }
        </style>
    </head>
    <body class="font-inter antialiased bg-white min-h-full">
        <div class="min-h-screen">
            <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-white/80 backdrop-blur-sm shadow-sm border-b border-blue-100">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>

            <!-- Bootstrap Toast Notifications -->
            <?php
                $successMessage = session('success');
                $errorMessage = session('error');
                $infoMessage = session('info');
            ?>

            <div aria-live="polite" aria-atomic="true" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;">
                <?php if($successMessage): ?>
                    <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-check-circle me-2"></i>
                                <?php echo e($successMessage); ?>

                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($errorMessage): ?>
                    <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="8000">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <?php echo e($errorMessage); ?>

                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($infoMessage): ?>
                    <div class="toast align-items-center text-white bg-info border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="6000">
                        <div class="d-flex">
                            <div class="toast-body">
                                <i class="fas fa-info-circle me-2"></i>
                                <?php echo e($infoMessage); ?>

                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <script>
                // Auto-initialize Bootstrap toasts
                document.addEventListener('DOMContentLoaded', function() {
                    const toastElList = [].slice.call(document.querySelectorAll('.toast'))
                    const toastList = toastElList.map(function(toastEl) {
                        return new bootstrap.Toast(toastEl)
                    })
                });
            </script>

            <!-- Page Content -->
            <main class="pb-8">
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo e($slot ?? ''); ?>

            </main>

            <!-- Footer -->
            <footer class="bg-blue-900 text-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div class="text-center">
                        <h3 class="text-lg font-bold text-orange-400 mb-2">TryOut ASNku</h3>
                        <p class="text-blue-200 text-sm">&copy; <?php echo e(date('Y')); ?> TryOut ASNku. Platform terbaik untuk persiapan CPNS & PPPK.</p>
                    </div>
                </div>
            </footer>
        </div>

        <!-- JavaScript for mobile menu & interactive elements -->
        <script>
            // Mobile menu toggle
            function toggleMobileMenu() {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            }

            // Close flash messages
            document.addEventListener('click', function(e) {
                if (e.target.closest('.flash-close')) {
                    e.target.closest('.flash-message').remove();
                }
            });

            // Custom Toast Notification Function
            function showCustomToast(type, title, message, duration = 3000) {
                // Create toast container if not exists
                let container = document.getElementById('toast-container');
                if (!container) {
                    container = document.createElement('div');
                    container.id = 'toast-container';
                    container.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999;';
                    document.body.appendChild(container);
                }

                // Create toast element
                const toast = document.createElement('div');
                toast.className = `custom-toast toast-${type}`;

                // Set icon based on type
                let icon = '';
                switch(type) {
                    case 'success':
                        icon = '<i class="fas fa-check-circle"></i>';
                        break;
                    case 'error':
                        icon = '<i class="fas fa-exclamation-circle"></i>';
                        break;
                    case 'warning':
                        icon = '<i class="fas fa-exclamation-triangle"></i>';
                        break;
                    case 'info':
                        icon = '<i class="fas fa-info-circle"></i>';
                        break;
                }

                toast.innerHTML = `
                    <div class="toast-content">
                        <div class="toast-icon">${icon}</div>
                        <div class="toast-text">
                            <div class="toast-title">${title}</div>
                            <div class="toast-message">${message}</div>
                        </div>
                        <div class="toast-close" onclick="removeToast(this)">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="toast-progress" style="width: 100%; transition: width ${duration}ms linear;"></div>
                `;

                // Add toast to container
                container.appendChild(toast);

                // Auto remove after duration
                setTimeout(() => {
                    removeToast(toast.querySelector('.toast-close'));
                }, duration);

                // Pause on hover
                toast.addEventListener('mouseenter', function() {
                    const progressBar = toast.querySelector('.toast-progress');
                    progressBar.style.transitionPlayState = 'paused';
                });

                toast.addEventListener('mouseleave', function() {
                    const progressBar = toast.querySelector('.toast-progress');
                    progressBar.style.transitionPlayState = 'running';
                });
            }

            // Remove toast function
            function removeToast(closeButton) {
                const toast = closeButton.closest('.custom-toast');
                if (toast) {
                    toast.classList.add('fade-out');
                    setTimeout(() => {
                        if (toast.parentNode) {
                            toast.parentNode.removeChild(toast);
                        }
                    }, 300);
                }
            }
        </script>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>