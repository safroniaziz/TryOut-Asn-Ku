<?php $__env->startSection('content'); ?>
<!-- Handle Validation Errors with SweetAlert -->
<?php if($errors->any()): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let errorMessages = '';
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        errorMessages += '• <?php echo e($error); ?>\n';
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    Swal.fire({
        title: '❌ Login Error',
        html: `
            <div class="text-left">
                <p class="text-gray-600 mb-4">Terdapat kesalahan dalam login:</p>
                <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                    <pre class="text-red-700 text-sm whitespace-pre-line">${errorMessages}</pre>
                </div>
            </div>
        `,
        icon: 'error',
        confirmButtonText: 'Coba Lagi',
        confirmButtonColor: '#ef4444',
        customClass: {
            popup: 'rounded-2xl shadow-2xl',
            title: 'text-xl font-bold text-gray-800',
            confirmButton: 'font-semibold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300'
        },
        backdrop: 'rgba(0,0,0,0.4)'
    });
});
</script>
<?php endif; ?>

<div class="gradient-bg min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="max-w-6xl mx-auto w-full px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center justify-center min-h-screen">

            <!-- Left Side - Informative Branding -->
            <div class="hidden lg:flex lg:w-1/2 flex-col justify-center pr-8">
                <div class="text-white space-y-6">
                    <!-- Logo Brand dengan Design Premium -->
                    <div class="flex items-center space-x-5 group mb-8">
                        <div class="relative transform group-hover:scale-110 transition-all duration-500">
                            <div class="relative w-18 h-18 bg-gradient-to-br from-blue-600 via-purple-600 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-graduation-cap text-white text-3xl transform group-hover:rotate-12 transition-transform duration-500"></i>
                            </div>
                        </div>

                        <div class="transform group-hover:translate-x-1 transition-transform duration-500">
                            <div class="font-black text-5xl text-white">
                                TryOut<span class="text-orange-300">ASN</span>ku
                            </div>
                            <div class="text-base font-semibold text-blue-200">
                                Platform Premium
                            </div>
                        </div>
                    </div>

                    <p class="text-xl text-blue-100 leading-relaxed mb-8">
                        Platform persiapan <span class="font-bold text-orange-300">CPNS & PPPK</span> terpercaya
                    </p>                    <!-- Informative Features -->
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-book-open text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">50,000+ Soal Premium</div>
                                <div class="text-blue-200 text-base">Bank soal terlengkap dengan pembahasan detail</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-chart-line text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Analisis Mendalam</div>
                                <div class="text-blue-200 text-base">Laporan dan rekomendasi belajar personal</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-trophy text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Ranking Nasional</div>
                                <div class="text-blue-200 text-base">Kompetisi dengan ribuan peserta lain</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-users text-white text-lg"></i>
                            </div>
                            <div>
                                <div class="text-white font-bold text-lg">Komunitas Aktif</div>
                                <div class="text-blue-200 text-sm">Belajar bersama 10,000+ member</div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-3 gap-4 pt-4 border-t border-white/20">
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">98%</div>
                            <div class="text-blue-200 text-xs">Success Rate</div>
                        </div>
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">10K+</div>
                            <div class="text-blue-200 text-xs">Members</div>
                        </div>
                        <div class="text-center">
                            <div class="text-xl font-bold text-white">24/7</div>
                            <div class="text-blue-200 text-xs">Support</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="w-full lg:w-1/2 flex items-center justify-center">
                <!-- Mobile Logo -->
                <div class="lg:hidden text-center mb-8">
                    <h1 class="text-4xl font-black text-white mb-2">
                        TryOut<span class="text-orange-400">ASN</span>ku
                    </h1>
                    <p class="text-blue-100">Platform persiapan CPNS & PPPK terpercaya</p>
                </div>

                <div class="w-full max-w-md">
                    <!-- Login Card -->
                    <div class="bg-white rounded-3xl p-8 shadow-2xl">
                        <!-- Header -->
                        <div class="text-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 via-blue-600 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <i class="fas fa-user text-white text-2xl"></i>
                            </div>
                            <h2 class="text-3xl font-black text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800 mb-2">
                                Masuk Akun
                            </h2>
                            <p class="text-gray-600 text-lg font-medium">
                                Mulai perjalanan menuju <span class="text-blue-600 font-bold">ASN impianmu</span>
                            </p>
                            <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mx-auto mt-3"></div>

                            <!-- Back to Home Button -->
                            <div class="mt-6">
                                <a href="<?php echo e(url('/')); ?>"
                                   class="group inline-flex items-center space-x-3 bg-gradient-to-r from-gray-50 to-blue-50 hover:from-blue-50 hover:to-blue-100 px-4 py-3 rounded-xl border border-gray-200 hover:border-blue-300 transition-all duration-300 transform hover:scale-105 shadow-sm hover:shadow-md">
                                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center group-hover:from-blue-600 group-hover:to-blue-700 transition-all duration-300">
                                        <i class="fas fa-arrow-left text-white text-sm"></i>
                                    </div>
                                    <span class="text-gray-700 font-semibold group-hover:text-blue-700 transition-colors duration-300">Kembali ke Halaman Utama</span>
                                </a>
                            </div>
                        </div>

                        <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-6">
                            <?php echo csrf_field(); ?>

                            <!-- Email Field -->
                            <div class="space-y-2">
                                <label for="email" class="block text-sm font-semibold text-gray-700">
                                    Email Address
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-gray-400"></i>
                                    </div>
                                    <input id="email"
                                           type="email"
                                           name="email"
                                           value="<?php echo e(old('email')); ?>"
                                           required
                                           autocomplete="email"
                                           placeholder="Masukkan email Anda"
                                           class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300">
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="space-y-2">
                                <label for="password" class="block text-sm font-semibold text-gray-700">
                                    Password
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-lock text-gray-400"></i>
                                    </div>
                                    <input id="password"
                                           type="password"
                                           name="password"
                                           required
                                           autocomplete="current-password"
                                           placeholder="Masukkan password Anda"
                                           class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300">
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <!-- Remember & Forgot -->
                            <div class="flex items-center justify-between pt-2">
                                <label class="flex items-center">
                                    <input type="checkbox"
                                           name="remember"
                                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-gray-700 text-sm">Remember me</span>
                                </label>

                                <?php if(Route::has('password.request')): ?>
                                    <a href="<?php echo e(route('password.request')); ?>"
                                       class="text-blue-600 hover:text-blue-700 text-sm transition-colors duration-200">
                                        Forgot password?
                                    </a>
                                <?php endif; ?>
                            </div>

                            <!-- Login Button -->
                            <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center space-x-2 shadow-lg">
                                <span>Sign In</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>

                        <!-- Register Link -->
                        <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                            <p class="text-gray-600">
                                Don't have an account?
                                <a href="<?php echo e(route('register')); ?>"
                                   class="font-bold text-blue-600 hover:text-blue-700 transition-colors duration-200">
                                    Create Account
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>