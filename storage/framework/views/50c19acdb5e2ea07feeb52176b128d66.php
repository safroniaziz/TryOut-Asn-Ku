<div class="h-full flex flex-col">
    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden h-full flex flex-col">
        <!-- Header -->
        <div class="bg-gradient-to-r <?php echo e($package['type'] === 'CPNS' ? 'from-blue-600 to-blue-700' : 'from-emerald-600 to-green-700'); ?> p-4 flex-shrink-0">
            <div class="flex items-center justify-between mb-3">
                <!-- Access Type Badge -->
                <?php if($package['is_free_package']): ?>
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg px-3 py-1 shadow-md">
                        <span class="text-white text-xs font-bold flex items-center">
                            <i class="fas fa-unlock mr-1"></i>FREE
                        </span>
                    </div>
                <?php else: ?>
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-lg px-3 py-1 shadow-md">
                        <span class="text-white text-xs font-bold flex items-center">
                            <i class="fas fa-crown mr-1"></i>PREMIUM
                        </span>
                    </div>
                <?php endif; ?>

                <!-- Right side badges container -->
                <div class="flex items-center space-x-2">
                    <!-- Time Access Badge -->
                    <?php if($package['time_access_label']): ?>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg px-3 py-1 border border-white/20">
                            <span class="text-white text-xs font-bold">
                                <?php if(str_contains($package['time_access_label'], 'Serentak')): ?>
                                    🏆 <?php echo e($package['time_access_label']); ?>

                                <?php else: ?>
                                    🎯 <?php echo e($package['time_access_label']); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <h3 class="text-xl font-bold text-white mb-2 leading-tight">
                <?php echo e($package['name']); ?>

            </h3>
            <div class="flex items-center space-x-4 <?php echo e($package['type'] === 'CPNS' ? 'text-blue-100' : 'text-emerald-100'); ?> text-sm">
                <!-- Question Count -->
                <div class="flex items-center">
                    <i class="fas fa-layer-group mr-2"></i>
                    <span><?php echo e(count($package['category_names'])); ?> Kategori</span>
                </div>
                <!-- Duration -->
                <div class="flex items-center">
                    <i class="fas fa-clock mr-2"></i>
                    <span><?php echo e(number_format($package['total_duration'])); ?> Menit</span>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-4 flex-grow">
            <!-- Progress and Stats -->
            <div class="space-y-4 flex-grow">
                <!-- Completion Rate -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs font-semibold text-gray-700">Penyelesaian</span>
                        <span class="text-xs font-bold <?php echo e($package['type'] === 'CPNS' ? 'text-blue-600' : 'text-emerald-600'); ?>"><?php echo e($package['completion_rate']); ?>%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-1.5">
                        <div class="bg-gradient-to-r <?php echo e($package['type'] === 'CPNS' ? 'from-blue-500 to-blue-600' : 'from-emerald-500 to-emerald-600'); ?> h-full rounded-full transition-all duration-300"
                             style="width: <?php echo e(min($package['completion_rate'], 100)); ?>%"></div>
                    </div>
                </div>

                <!-- Average Score -->
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs font-semibold text-gray-700">Skor Rata-rata</span>
                        <span class="text-xs font-bold text-green-600"><?php echo e($package['average_score']); ?>/100</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-1.5">
                        <div class="bg-gradient-to-r from-green-500 to-green-600 h-full rounded-full transition-all duration-300"
                             style="width: <?php echo e(min($package['average_score'], 100)); ?>%"></div>
                    </div>
                </div>

                <!-- Duration -->
                <div class="flex items-center justify-between p-2 bg-orange-50 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-clock text-orange-500 mr-2 text-sm"></i>
                        <span class="text-xs font-semibold text-gray-700">Durasi</span>
                    </div>
                    <span class="text-xs font-bold text-orange-600"><?php echo e(number_format($package['total_duration'])); ?> Menit</span>
                </div>

                <!-- User's Performance (if completed) -->
                <?php if($package['user_score_in_package'] > 0): ?>
                    <div class="p-2 bg-green-50 rounded-lg border border-green-200">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold text-green-700">Skor Anda</span>
                            <span class="text-sm font-bold text-green-600"><?php echo e($package['user_score_in_package']); ?>/100</span>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Test Categories Detail -->
                <div class="mt-auto pt-4">
                    <p class="text-xs font-bold text-gray-700 mb-2">Detail Kategori:</p>
                    <div class="space-y-2.5">
                        <?php if(!empty($package['category_details'])): ?>
                            <?php $__currentLoopData = $package['category_details']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg">
                                    <div class="flex items-center">
                                        <div class="w-2 h-2 <?php echo e($package['type'] === 'CPNS' ? 'bg-blue-500' : 'bg-emerald-500'); ?> rounded-full mr-2"></div>
                                        <span class="text-xs font-semibold text-gray-700"><?php echo e($category['name']); ?></span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs font-bold <?php echo e($package['type'] === 'CPNS' ? 'text-blue-600' : 'text-emerald-600'); ?>"><?php echo e($category['question_count']); ?> soal</span>
                                        <span class="text-xs font-semibold text-orange-600"><?php echo e($category['estimated_minutes']); ?> menit</span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="p-2 bg-gray-50 rounded-lg"></div>
                                <span class="text-xs text-gray-600"><?php echo e($package['tryouts']->first()->kategori); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 px-4 py-3 border-t border-gray-100 flex-shrink-0">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs text-gray-500 flex items-center">
                    <?php if($package['type'] === 'CPNS'): ?>
                        <i class="fas fa-building mr-1 text-blue-500"></i>
                        <span class="font-semibold text-blue-600">CPNS</span>
                    <?php else: ?>
                        <i class="fas fa-user-tie mr-1 text-emerald-500"></i>
                        <span class="font-semibold text-emerald-600">PPPK</span>
                    <?php endif; ?>
                </span>
                <?php if($package['is_completed_by_user']): ?>
                    <span class="text-xs font-semibold text-green-600">
                        ✓ Selesai
                    </span>
                <?php else: ?>
                    <span class="text-xs font-semibold text-orange-600">
                        ○ Belum Selesai
                    </span>
                <?php endif; ?>
            </div>

            <!-- CTA Button -->
            <?php if($package['is_premium_package'] && !$hasPremium): ?>
                <a href="<?php echo e(route('subscription.premium')); ?>"
                   class="flex items-center justify-center w-full bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                    <i class="fas fa-crown text-yellow-300 text-sm"></i>
                    <span class="text-sm">Upgrade Premium</span>
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('tryouts.show', $package['tryouts']->first())); ?>"
                   class="flex items-center justify-center w-full bg-gradient-to-r <?php echo e($package['type'] === 'CPNS' ? 'from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700' : 'from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700'); ?> text-white font-bold py-2.5 px-4 rounded-lg transition-all duration-200 text-center shadow-md hover:shadow-lg space-x-2">
                    <?php if($package['is_completed_by_user']): ?>
                        <i class="fas fa-redo text-sm"></i>
                        <span class="text-sm">Kerjakan Lagi</span>
                        <i class="fas fa-chart-line text-sm"></i>
                    <?php else: ?>
                        <?php if($package['is_free']): ?>
                            <i class="fas fa-rocket text-yellow-300 text-sm"></i>
                            <span class="text-sm">Mulai Gratis</span>
                            <i class="fas fa-star text-yellow-300 text-sm"></i>
                        <?php else: ?>
                            <i class="fas fa-play text-sm"></i>
                            <span class="text-sm">Mulai Tes</span>
                            <i class="fas fa-fire text-orange-300 text-sm"></i>
                        <?php endif; ?>
                    <?php endif; ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/resources/views/partials/package-card.blade.php ENDPATH**/ ?>