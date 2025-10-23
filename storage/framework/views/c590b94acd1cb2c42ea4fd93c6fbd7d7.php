<nav x-data="{ open: false }" class="bg-white/90 backdrop-blur-xl border-b border-gray-200/40 sticky top-0 z-50 shadow-lg transition-all duration-300">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-8">
                <!-- Clean Logo with Subtle Polish -->
                <div class="shrink-0 flex items-center">
                    <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 via-purple-600 to-orange-500 rounded-xl flex items-center justify-center shadow-sm transition-all duration-300 hover:shadow-md">
                            <i class="fas fa-graduation-cap text-white text-lg"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-xl bg-gradient-to-r from-blue-600 via-purple-600 to-orange-500 bg-clip-text text-transparent">TryOut ASNku</span>
                            <span class="text-xs text-gray-500 font-medium">Platform CPNS & PPPK</span>
                        </div>
                    </a>
                </div>

                <!-- Clean Navigation Links -->
                <div class="hidden items-center space-x-2 sm:flex">
                    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('dashboard'),'active' => request()->routeIs('dashboard'),'class' => 'nav-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('dashboard')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('dashboard')),'class' => 'nav-link']); ?>
                        <div class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200 <?php echo e(request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 font-semibold' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'); ?>">
                            <i class="fas fa-home mr-2 text-sm"></i>
                            <span class="text-sm"><?php echo e(__('Dashboard')); ?></span>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('tryouts.index'),'active' => request()->routeIs('tryouts.*'),'class' => 'nav-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('tryouts.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('tryouts.*')),'class' => 'nav-link']); ?>
                        <div class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200 <?php echo e(request()->routeIs('tryouts.*') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'); ?>">
                            <i class="fas fa-book-open mr-2 text-sm"></i>
                            <span class="text-sm"><?php echo e(__('TryOut')); ?></span>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('materis.index'),'active' => request()->routeIs('materis.*'),'class' => 'nav-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('materis.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('materis.*')),'class' => 'nav-link']); ?>
                        <div class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200 <?php echo e(request()->routeIs('materis.*') ? 'bg-purple-50 text-purple-700 font-semibold' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'); ?>">
                            <i class="fas fa-download mr-2 text-sm"></i>
                            <span class="text-sm"><?php echo e(__('Materi')); ?></span>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => route('leaderboards.index'),'active' => request()->routeIs('leaderboards.*'),'class' => 'nav-link']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('leaderboards.index')),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(request()->routeIs('leaderboards.*')),'class' => 'nav-link']); ?>
                        <div class="flex items-center px-3 py-2 rounded-lg transition-colors duration-200 <?php echo e(request()->routeIs('leaderboards.*') ? 'bg-amber-50 text-amber-700 font-semibold' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'); ?>">
                            <i class="fas fa-trophy mr-2 text-sm"></i>
                            <span class="text-sm"><?php echo e(__('Leaderboard')); ?></span>
                        </div>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
                </div>
            </div>

            <!-- Right side items -->
            <div class="hidden sm:flex sm:items-center sm:space-x-3">
                <?php if(auth()->guard()->check()): ?>
                    <!-- Beautiful Premium Status -->
                    <?php if(auth()->user()->hasActivePremiumSubscription()): ?>
                        <div class="flex items-center space-x-2 px-3 py-1.5 bg-gradient-to-r from-amber-100 to-orange-100 border border-amber-200 rounded-lg">
                            <i class="fas fa-crown text-amber-600 text-sm"></i>
                            <span class="text-sm font-semibold text-amber-800">Premium</span>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e(route('subscription.premium')); ?>" class="flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white text-sm font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-crown text-amber-300 text-sm"></i>
                            <span>Upgrade Premium</span>
                        </a>
                    <?php endif; ?>

                    <!-- User Dropdown -->
                    <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'right','width' => '64']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right','width' => '64']); ?>
                         <?php $__env->slot('trigger', null, []); ?> 
                            <button class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                <div class="relative">
                                    <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-sm">
                                        <span class="text-white text-sm font-semibold"><?php echo e(substr(Auth::user()->name, 0, 1)); ?></span>
                                    </div>
                                    <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="hidden lg:block text-left">
                                    <div class="text-sm font-semibold text-gray-900"><?php echo e(Auth::user()->name); ?></div>
                                </div>
                                <svg class="fill-current h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                         <?php $__env->endSlot(); ?>

                         <?php $__env->slot('content', null, []); ?> 
                            <!-- Enhanced User Info -->
                            <div class="px-4 py-3 border-b border-gray-100 bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50">
                                <div class="flex items-center space-x-3">
                                    <div class="relative flex-shrink-0">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-white font-bold text-lg"><?php echo e(substr(Auth::user()->name, 0, 1)); ?></span>
                                        </div>
                                        <div class="absolute -top-1 -right-1 w-4 h-4 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center">
                                            <i class="fas fa-check text-white text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="font-bold text-gray-900 truncate"><?php echo e(Auth::user()->name); ?></div>
                                        <div class="text-sm text-gray-500"><?php echo e(Auth::user()->email); ?></div>
                                        <div class="flex items-center mt-1">
                                            <i class="fas fa-star text-amber-500 text-xs mr-1"></i>
                                            <span class="text-xs font-medium text-amber-600">Member <?php echo e(now()->format('Y')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Interactive Menu Items -->
                            <div class="py-2">
                                <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('subscription.history'),'class' => 'flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('subscription.history')),'class' => 'flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200 group']); ?>
                                    <i class="fas fa-credit-card mr-3 text-blue-500 transition-colors duration-200 group-hover:text-blue-600"></i>
                                    <span class="font-medium transition-colors duration-200 group-hover:text-blue-700"><?php echo e(__('Langganan Saya')); ?></span>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                                <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('profile.edit'),'class' => 'flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit')),'class' => 'flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200 group']); ?>
                                    <i class="fas fa-user mr-3 text-purple-500 transition-colors duration-200 group-hover:text-purple-600"></i>
                                    <span class="font-medium transition-colors duration-200 group-hover:text-purple-700"><?php echo e(__('Pengaturan Profil')); ?></span>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                            </div>

                            <!-- Logout Section -->
                            <div class="border-t border-gray-100">
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();','class' => 'flex items-center px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-all duration-200 group']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();','class' => 'flex items-center px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-all duration-200 group']); ?>
                                    <i class="fas fa-sign-out-alt mr-3 transition-colors duration-200 group-hover:text-red-700"></i>
                                    <span class="font-medium transition-colors duration-200 group-hover:text-red-700"><?php echo e(__('Keluar')); ?></span>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                                </form>
                            </div>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
                <?php else: ?>
                    <!-- Guest Buttons -->
                    <div class="flex items-center space-x-3">
                        <a href="<?php echo e(route('login')); ?>" class="text-gray-600 hover:text-gray-900 px-4 py-2 text-sm font-medium hover:bg-gray-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            <span><?php echo e(__('Masuk')); ?></span>
                        </a>
                        <a href="<?php echo e(route('register')); ?>" class="px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white text-sm font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                            <i class="fas fa-user-plus mr-2"></i>
                            <span><?php echo e(__('Daftar')); ?></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Mobile menu button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition-colors duration-200">
                    <svg class="w-6 h-6" :class="{'hidden': open, 'block': ! open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6" :class="{'block': open, 'hidden': ! open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Clean Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-gray-200">
        <div class="pt-2 pb-3 space-y-1">
            <!-- Mobile Navigation Links -->
            <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center px-4 py-2 text-base font-medium <?php echo e(request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 border-l-4 border-blue-500' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800'); ?>">
                <i class="fas fa-home mr-3"></i>
                <?php echo e(__('Dashboard')); ?>

            </a>
            <a href="<?php echo e(route('tryouts.index')); ?>" class="flex items-center px-4 py-2 text-base font-medium <?php echo e(request()->routeIs('tryouts.*') ? 'bg-emerald-50 text-emerald-700 border-l-4 border-emerald-500' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800'); ?>">
                <i class="fas fa-book-open mr-3"></i>
                <?php echo e(__('TryOut')); ?>

            </a>
            <a href="<?php echo e(route('materis.index')); ?>" class="flex items-center px-4 py-2 text-base font-medium <?php echo e(request()->routeIs('materis.*') ? 'bg-purple-50 text-purple-700 border-l-4 border-purple-500' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800'); ?>">
                <i class="fas fa-download mr-3"></i>
                <?php echo e(__('Materi')); ?>

            </a>
            <a href="<?php echo e(route('leaderboards.index')); ?>" class="flex items-center px-4 py-2 text-base font-medium <?php echo e(request()->routeIs('leaderboards.*') ? 'bg-amber-50 text-amber-700 border-l-4 border-amber-500' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800'); ?>">
                <i class="fas fa-trophy mr-3"></i>
                <?php echo e(__('Leaderboard')); ?>

            </a>
        </div>

        <!-- Mobile User Section -->
        <?php if(auth()->guard()->check()): ?>
        <div class="pt-4 pb-3 border-t border-gray-200">
            <!-- User Info -->
            <div class="px-4 py-3 bg-gray-50">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-semibold"><?php echo e(substr(Auth::user()->name, 0, 1)); ?></span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="font-medium text-gray-900 truncate"><?php echo e(Auth::user()->name); ?></div>
                        <div class="text-sm text-gray-500 truncate"><?php echo e(Auth::user()->email); ?></div>
                        <?php if(auth()->user()->hasActivePremiumSubscription()): ?>
                            <div class="flex items-center mt-1">
                                <i class="fas fa-crown text-amber-500 text-xs mr-1"></i>
                                <span class="text-xs font-medium text-amber-600">Premium</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Items -->
            <div class="mt-3 space-y-1 px-2">
                <a href="<?php echo e(route('profile.edit')); ?>" class="flex items-center px-4 py-3 text-base text-gray-600 hover:bg-gray-50 hover:text-gray-800 rounded-lg min-h-[48px]">
                    <i class="fas fa-user mr-3 text-gray-400"></i>
                    <?php echo e(__('Profile')); ?>

                </a>
                <a href="<?php echo e(route('subscription.history')); ?>" class="flex items-center px-4 py-3 text-base text-gray-600 hover:bg-gray-50 hover:text-gray-800 rounded-lg min-h-[48px]">
                    <i class="fas fa-credit-card mr-3 text-gray-400"></i>
                    <?php echo e(__('Langganan')); ?>

                </a>

                <!-- Mobile Logout -->
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full flex items-center px-4 py-3 text-base text-red-600 hover:bg-red-50 rounded-lg min-h-[48px]">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <?php echo e(__('Log Out')); ?>

                    </button>
                </form>
            </div>
        </div>
        <?php else: ?>
        <!-- Mobile Guest Section -->
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="px-4 space-y-2">
                <a href="<?php echo e(route('login')); ?>" class="block text-center px-4 py-2 text-base font-medium text-gray-600 hover:bg-gray-50 rounded-lg">
                    <?php echo e(__('Masuk')); ?>

                </a>
                <a href="<?php echo e(route('register')); ?>" class="block text-center px-4 py-2 text-base font-medium bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg hover:from-blue-700 hover:to-purple-700">
                    <?php echo e(__('Daftar')); ?>

                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</nav>
<?php /**PATH /var/www/html/resources/views/layouts/navigation.blade.php ENDPATH**/ ?>