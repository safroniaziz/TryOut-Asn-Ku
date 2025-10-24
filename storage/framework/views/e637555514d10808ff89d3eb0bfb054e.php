<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-8 max-w-6xl">
    <!-- Header -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Upgrade Premium</h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Pilih upgrade yang sesuai dengan kebutuhan Anda. Dapatkan akses lengkap ke semua fitur premium!
        </p>
    </div>

    <!-- Current Subscription Info -->
    <?php if($currentSubscription): ?>
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-blue-900">Status Premium Anda</h3>
                    <p class="text-blue-700">
                        Langganan aktif hingga <?php echo e($currentSubscription->tanggal_akhir->format('d F Y')); ?>

                    </p>
                </div>
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded-full font-semibold">
                    ✨ Premium Active
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Upgrade Options -->
    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Individual Upgrade -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">👤 Upgrade Individu</h2>
                        <p class="text-blue-100">Upgrade hanya untuk akun Anda sendiri</p>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <!-- Package Selection -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Pilih Paket Anda:</h3>

                    <div class="space-y-4">
                        <!-- CPNS Package -->
                        <label class="package-card cursor-pointer border-2 border-gray-200 rounded-xl p-4 hover:border-blue-500 transition-colors" data-package="cpns">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input type="radio" name="individual_package" value="1" class="mr-3">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Paket CPNS Lengkap</h4>
                                        <p class="text-sm text-gray-600">Unlimited CPNS tryouts + challenges</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-gray-900">Rp 199.000</div>
                                    <div class="text-sm text-green-600 font-semibold">Best Seller</div>
                                </div>
                            </div>
                        </label>

                        <!-- PPPK Package -->
                        <label class="package-card cursor-pointer border-2 border-gray-200 rounded-xl p-4 hover:border-blue-500 transition-colors" data-package="pppk">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input type="radio" name="individual_package" value="2" class="mr-3">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Paket PPPK Lengkap</h4>
                                        <p class="text-sm text-gray-600">Unlimited PPPK tryouts + challenges</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-gray-900">Rp 199.000</div>
                                    <div class="text-sm text-gray-600">Populer</div>
                                </div>
                            </div>
                        </label>

                        <!-- Combined Package -->
                        <label class="package-card cursor-pointer border-2 border-gray-200 rounded-xl p-4 hover:border-blue-500 transition-colors relative" data-package="combined">
                            <div class="absolute -top-3 -right-3">
                                <span class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    BEST VALUE
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input type="radio" name="individual_package" value="3" class="mr-3">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Paket CPNS + PPPK</h4>
                                        <p class="text-sm text-gray-600">Semua modul CPNS & PPPK + challenges</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-gray-900">Rp 349.000</div>
                                    <div class="text-sm text-red-600 line-through">Hemat Rp 49.000</div>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Features List -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Yang Anda Dapatkan:</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">Akses unlimited ke semua tryout</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">Semua modul pembelajaran</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">Akses ke Achievement Challenges</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">Cashback rewards hingga Rp 15.000</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mr-3 mt-1"></i>
                            <span class="text-gray-700">Analisis performa detail</span>
                        </li>
                    </ul>
                </div>

                <!-- Action Button -->
                <form id="individualUpgradeForm" method="POST" action="<?php echo e(route('subscription.subscribe')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="package_id" id="individualPackageId" value="1">
                    <input type="hidden" name="payment_method" value="transfer">

                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold py-4 rounded-xl hover:from-blue-700 hover:to-blue-800 transition-all duration-200 shadow-lg">
                        <i class="fas fa-crown mr-2"></i>
                        Upgrade Sekarang
                    </button>
                </form>
            </div>
        </div>

        <!-- Bulk Upgrade -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">👥 Upgrade Rame-Rame</h2>
                            <p class="text-green-100">Upgrade + teman dan dapat diskon besar!</p>
                        </div>
                    </div>
                    <div class="bg-yellow-400 text-yellow-900 px-3 py-1 rounded-full font-bold text-sm">
                        💰 Hemat 10-15%
                    </div>
                </div>
            </div>

            <div class="p-8">
                <!-- Discount Info -->
                <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl p-4 mb-6">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                            <i class="fas fa-percentage text-white"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-yellow-900">Diskon Khusus Grup!</h3>
                            <p class="text-yellow-700 text-sm">
                                <strong>3 orang = 10% diskon</strong>, <strong>4 orang = 11% diskon</strong>,
                                <strong>8+ orang = 15% diskon maksimal</strong>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Package Selection (Same as individual) -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Pilih Paket Grup:</h3>

                    <div class="space-y-3">
                        <label class="package-card cursor-pointer border-2 border-gray-200 rounded-lg p-3 hover:border-green-500 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input type="radio" name="bulk_package" value="1" class="mr-3">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">CPNS Lengkap</h4>
                                        <p class="text-xs text-gray-600">Rp 199.000/orang</p>
                                    </div>
                                </div>
                                <div class="text-lg font-bold text-gray-900">Rp 199.000</div>
                            </div>
                        </label>

                        <label class="package-card cursor-pointer border-2 border-gray-200 rounded-lg p-3 hover:border-green-500 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input type="radio" name="bulk_package" value="2" class="mr-3">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">PPPK Lengkap</h4>
                                        <p class="text-xs text-gray-600">Rp 199.000/orang</p>
                                    </div>
                                </div>
                                <div class="text-lg font-bold text-gray-900">Rp 199.000</div>
                            </div>
                        </label>

                        <label class="package-card cursor-pointer border-2 border-gray-200 rounded-lg p-3 hover:border-green-500 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input type="radio" name="bulk_package" value="3" class="mr-3">
                                    <div>
                                        <h4 class="font-semibold text-gray-900">CPNS + PPPK</h4>
                                        <p class="text-xs text-gray-600">Rp 349.000/orang</p>
                                    </div>
                                </div>
                                <div class="text-lg font-bold text-gray-900">Rp 349.000</div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- People Management -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Tambahkan Orang:</h3>

                    <!-- Self (automatically included) -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <i class="fas fa-user-circle text-blue-500 text-xl mr-3"></i>
                                <div>
                                    <div class="font-semibold text-blue-900">Anda (Account Utama)</div>
                                    <div class="text-sm text-blue-700"><?php echo e(auth()->user()->email); ?></div>
                                </div>
                            </div>
                            <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs font-semibold">INCLUDED</span>
                        </div>
                    </div>

                    <!-- Add More People -->
                    <div class="text-center mb-4">
                        <button id="addPersonBtn" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-user-plus mr-2"></i>
                            + Tambah Orang
                        </button>
                    </div>

                    <!-- People List -->
                    <div id="peopleList" class="space-y-3 max-h-64 overflow-y-auto">
                        <!-- People will be added here dynamically -->
                    </div>
                </div>

                <!-- Bulk Calculator -->
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <h4 class="font-semibold text-gray-900 mb-3">Ringkasan Pembayaran:</h4>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Orang:</span>
                            <span id="totalPeople" class="font-semibold">1</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Harga Normal:</span>
                            <span id="normalPrice" class="font-semibold">Rp 199.000</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Diskon:</span>
                            <span id="discountPercent" class="font-semibold text-green-600">0%</span>
                        </div>
                        <div class="flex justify-between text-red-600 font-semibold">
                            <span>Anda Hemat:</span>
                            <span id="savings">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold border-t pt-2">
                            <span>Total Pembayaran:</span>
                            <span id="totalPrice" class="text-green-600">Rp 199.000</span>
                        </div>
                    </div>
                </div>

                <!-- Action Button -->
                <form id="bulkUpgradeForm" method="POST" action="<?php echo e(route('subscription.subscribe-bulk')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="package_id" id="bulkPackageId" value="1">
                    <input type="hidden" name="payment_method" value="transfer">
                    <input type="hidden" name="people" id="peopleData" value="[]">

                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold py-4 rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-lg">
                        <i class="fas fa-users mr-2"></i>
                        Proses Upgrade Rame-Rame
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Person Modal (Hidden by default) -->
<div id="addPersonModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
    <div class="bg-white rounded-xl p-6 w-96 max-w-md mx-4">
        <h3 class="text-xl font-bold text-gray-900 mb-4">Tambah Orang</h3>

        <form id="addPersonForm">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" id="personName" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" id="personEmail" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                <div id="emailStatus" class="text-sm mt-1 hidden"></div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">No. WhatsApp</label>
                <input type="tel" id="personPhone" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeAddPersonModal()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Tambah
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.package-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.package-card input:checked + div {
    border-color: #3B82F6;
    background-color: #EFF6FF;
}

.person-item {
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>

<script>
// Global variables
let peopleCount = 1; // Start with self
let selectedPackagePrice = 199000;
let peopleList = [];

// Package selection
document.querySelectorAll('input[name="individual_package"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.value == '1' || this.value == '2') {
            selectedPackagePrice = 199000;
        } else if (this.value == '3') {
            selectedPackagePrice = 349000;
        }
        // Update hidden input for form submission
        document.getElementById('individualPackageId').value = this.value;
        updateBulkCalculator();
    });
});

document.querySelectorAll('input[name="bulk_package"]').forEach(radio => {
    radio.addEventListener('change', function() {
        if (this.value == '1' || this.value == '2') {
            selectedPackagePrice = 199000;
        } else if (this.value == '3') {
            selectedPackagePrice = 349000;
        }
        // Update hidden input for form submission
        document.getElementById('bulkPackageId').value = this.value;
        updateBulkCalculator();
    });
});

// Modal functions
function showAddPersonModal() {
    document.getElementById('addPersonModal').classList.remove('hidden');
}

function closeAddPersonModal() {
    document.getElementById('addPersonModal').classList.add('hidden');
    document.getElementById('addPersonForm').reset();
    document.getElementById('emailStatus').classList.add('hidden');
}

// Add person functionality
document.getElementById('addPersonBtn').addEventListener('click', showAddPersonModal);

document.getElementById('addPersonForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const name = document.getElementById('personName').value;
    const email = document.getElementById('personEmail').value;
    const phone = document.getElementById('personPhone').value;

    // Check if email already exists
    try {
        const response = await fetch('/api/check-user-email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ email: email })
        });

        const result = await response.json();

        const person = {
            id: Date.now(),
            name: name,
            email: email,
            phone: phone,
            status: result.exists ? 'existing' : 'new',
            userId: result.user_id || null
        };

        peopleList.push(person);
        addPersonToUI(person);
        peopleCount++;
        updateBulkCalculator();
        closeAddPersonModal();

    } catch (error) {
        console.error('Error checking user:', error);
        // Add anyway if error occurs
        const person = {
            id: Date.now(),
            name: name,
            email: email,
            phone: phone,
            status: 'unknown',
            userId: null
        };

        peopleList.push(person);
        addPersonToUI(person);
        peopleCount++;
        updateBulkCalculator();
        closeAddPersonModal();
    }
});

// Add person to UI
function addPersonToUI(person) {
    const peopleListEl = document.getElementById('peopleList');
    const personEl = document.createElement('div');
    personEl.className = 'person-item bg-gray-50 border border-gray-200 rounded-lg p-3 flex items-center justify-between';
    personEl.dataset.personId = person.id;

    const statusBadge = person.status === 'existing'
        ? '<span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-semibold">Existing User</span>'
        : '<span class="bg-green-100 text-green-800 px-2 py-1 rounded text-xs font-semibold">New User</span>';

    personEl.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-user-circle text-gray-400 text-lg mr-3"></i>
            <div>
                <div class="font-semibold text-gray-900">${person.name}</div>
                <div class="text-sm text-gray-600">${person.email}</div>
            </div>
        </div>
        <div class="flex items-center space-x-2">
            ${statusBadge}
            <button onclick="removePerson(${person.id})" class="text-red-500 hover:text-red-700">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;

    peopleListEl.appendChild(personEl);
}

// Remove person
function removePerson(personId) {
    peopleList = peopleList.filter(p => p.id !== personId);
    peopleCount--;

    const personEl = document.querySelector(`[data-person-id="${personId}"]`);
    if (personEl) {
        personEl.remove();
    }

    updateBulkCalculator();
}

// Update bulk calculator
function updateBulkCalculator() {
    const normalPrice = peopleCount * selectedPackagePrice;
    let discountPercentage = 0;

    if (peopleCount >= 3) {
        discountPercentage = Math.min(7 + (peopleCount * 1), 15);
    }

    const discountAmount = normalPrice * (discountPercentage / 100);
    const finalPrice = normalPrice - discountAmount;

    document.getElementById('totalPeople').textContent = peopleCount;
    document.getElementById('normalPrice').textContent = formatCurrency(normalPrice);
    document.getElementById('discountPercent').textContent = discountPercentage + '%';
    document.getElementById('savings').textContent = formatCurrency(discountAmount);
    document.getElementById('totalPrice').textContent = formatCurrency(finalPrice);
}

// Format currency
function formatCurrency(amount) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

// Update people data before bulk form submission
document.getElementById('bulkUpgradeForm').addEventListener('submit', function(e) {
    // Update people data with current list
    document.getElementById('peopleData').value = JSON.stringify(peopleList);
});

// Initialize calculator on page load
document.addEventListener('DOMContentLoaded', function() {
    updateBulkCalculator();
});

// Close modal when clicking outside
document.getElementById('addPersonModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAddPersonModal();
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/subscription/premium.blade.php ENDPATH**/ ?>