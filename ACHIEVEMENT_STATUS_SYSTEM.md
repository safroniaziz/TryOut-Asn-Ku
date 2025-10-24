# 🎯 Sistem Status Achievement Package

## Konsep Status

### **📊 3 Status Utama:**

#### 1. **Belum Dikerjakan** (not_started)
- **UI:** Background biru dengan icon clock
- **Status:** "Belum Dikerjakan"
- **Action:** "Mulai Sekarang"
- **Button:** "Mulai Paket" (biru)
- **Behavior:** User bisa mulai mengerjakan

#### 2. **Selesai & Berhasil** (completed)
- **UI:** Background hijau dengan icon check
- **Status:** "Selesai & Berhasil"
- **Action:** "Badge Unlocked"
- **Button:** "Badge Diperoleh" (hijau, disabled)
- **Behavior:** User sudah mendapat badge, tidak bisa dikerjakan lagi

#### 3. **Gagal** (failed)
- **UI:** Background merah dengan icon times
- **Status:** "Gagal"
- **Action:** "Kerjakan Ulang"
- **Button:** "Kerjakan Ulang" (orange/merah)
- **Behavior:** User bisa mengulang paket

## Implementasi UI

### **Status Card**
```html
<!-- Completed Status -->
<div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 border border-green-200">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-green-500 mr-2"></i>
            <span class="font-bold text-green-800">Selesai & Berhasil</span>
        </div>
        <div class="flex items-center text-green-600">
            <i class="fas fa-medal mr-1"></i>
            Badge Unlocked
        </div>
    </div>
</div>

<!-- Failed Status -->
<div class="bg-gradient-to-r from-red-50 to-pink-50 rounded-xl p-4 border border-red-200">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <i class="fas fa-times-circle text-red-500 mr-2"></i>
            <span class="font-bold text-red-800">Gagal</span>
        </div>
        <div class="flex items-center text-red-600">
            <i class="fas fa-redo mr-1"></i>
            Kerjakan Ulang
        </div>
    </div>
</div>

<!-- Not Started Status -->
<div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-200">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <i class="fas fa-clock text-blue-500 mr-2"></i>
            <span class="font-bold text-blue-800">Belum Dikerjakan</span>
        </div>
        <div class="flex items-center text-blue-600">
            <i class="fas fa-play mr-1"></i>
            Mulai Sekarang
        </div>
    </div>
</div>
```

### **Action Buttons**
```html
<!-- Completed Button -->
<button class="w-full px-6 py-4 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-bold rounded-xl cursor-not-allowed opacity-75">
    <i class="fas fa-check mr-3"></i>
    Badge Diperoleh
</button>

<!-- Failed Button -->
<button class="w-full px-6 py-4 bg-gradient-to-r from-orange-600 to-red-600 text-white font-bold rounded-xl hover:from-orange-700 hover:to-red-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
    <i class="fas fa-redo mr-3"></i>
    Kerjakan Ulang
</button>

<!-- Not Started Button -->
<button class="w-full px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
    <i class="fas fa-play mr-3"></i>
    Mulai Paket
</button>
```

## Backend Logic

### **Status Check Method**
```php
private function getPackageStatus(int $packageNumber): string
{
    // TODO: Implement actual database check
    // For now, return mock status based on package number
    // In real implementation, check user's package completion from database
    
    // Mock logic for demonstration
    if ($packageNumber <= 2) {
        return 'completed'; // First 2 packages completed
    } elseif ($packageNumber === 3) {
        return 'failed'; // Package 3 failed, can retry
    } else {
        return 'not_started'; // Remaining packages not started
    }
}
```

### **Challenge Data Structure**
```php
$challenges[] = [
    'type' => 'achievement_package',
    'package_number' => $package['package_number'],
    'title' => "Paket {$package['package_number']}: {$package['badge_name']}",
    'description' => "Selesaikan 15 soal (5 TIU + 5 TWK + 5 TKP) dengan minimal 12 benar. Maksimal 1 salah per kategori.",
    'badge_name' => $package['badge_name'],
    'badge_description' => $package['badge_description'],
    'questions' => $package['questions'],
    'total_questions' => $package['total_questions'],
    'min_correct' => $package['min_correct'],
    'max_wrong_per_category' => $package['max_wrong_per_category'],
    'cashback' => $package['cashback'],
    'estimated_time' => '45 menit',
    'status' => $status, // 'not_started', 'completed', 'failed'
    'can_retry' => $status === 'failed', // Can retry if failed
    'badge_earned' => $status === 'completed' // Badge earned if completed
];
```

## User Flow

### **1. Belum Dikerjakan**
- User melihat paket yang belum dikerjakan
- Status: "Belum Dikerjakan"
- Button: "Mulai Paket"
- Action: User klik untuk mulai mengerjakan

### **2. Sedang Dikerjakan**
- User mengerjakan 15 soal (5 TIU + 5 TWK + 5 TKP)
- Sistem mengecek hasil:
  - **Berhasil:** Minimal 12 benar, maksimal 1 salah per kategori
  - **Gagal:** Tidak memenuhi syarat

### **3. Berhasil**
- Status berubah menjadi "Selesai & Berhasil"
- Badge diperoleh
- Button menjadi "Badge Diperoleh" (disabled)
- Cashback diberikan (jika milestone)

### **4. Gagal**
- Status berubah menjadi "Gagal"
- Button menjadi "Kerjakan Ulang"
- User bisa mengulang paket yang sama
- Tidak ada batasan retry

## Database Schema (Future)

### **User Package Progress Table**
```sql
CREATE TABLE user_package_progress (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    package_number INT NOT NULL,
    status ENUM('not_started', 'in_progress', 'completed', 'failed') DEFAULT 'not_started',
    attempts INT DEFAULT 0,
    best_score INT DEFAULT 0,
    completed_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id),
    UNIQUE KEY unique_user_package (user_id, package_number)
);
```

### **Package Attempts Table**
```sql
CREATE TABLE package_attempts (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT NOT NULL,
    package_number INT NOT NULL,
    attempt_number INT NOT NULL,
    tiu_correct INT DEFAULT 0,
    tiu_wrong INT DEFAULT 0,
    twk_correct INT DEFAULT 0,
    twk_wrong INT DEFAULT 0,
    tkp_correct INT DEFAULT 0,
    tkp_wrong INT DEFAULT 0,
    total_correct INT DEFAULT 0,
    total_wrong INT DEFAULT 0,
    status ENUM('completed', 'failed') NOT NULL,
    completed_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

## Business Logic

### **Completion Criteria**
- **Minimal 12 benar** dari 15 soal total
- **Maksimal 1 salah** per kategori (TIU, TWK, TKP)
- **Waktu:** 45 menit per paket

### **Retry Logic**
- **Unlimited retry** untuk paket yang gagal
- **No penalty** untuk retry
- **Progress tracking** per attempt
- **Best score** dipertahankan

### **Badge System**
- **Badge diperoleh** setelah berhasil
- **Badge permanent** - tidak bisa hilang
- **Badge collection** - 10 badge total
- **Badge display** di profile user

## Metrics to Track

### **Completion Metrics**
- Package completion rate
- Average attempts per package
- Success rate per package
- Time to completion

### **User Behavior**
- Retry frequency
- Drop-off points
- Most difficult packages
- User progression patterns

### **Business Metrics**
- Badge earning rate
- Cashback redemption rate
- User engagement time
- Retention rate

## Future Enhancements

### **Phase 1 - Current**
- Basic status system
- Retry functionality
- Badge collection

### **Phase 2 - Next**
- Database integration
- Progress tracking
- Analytics dashboard

### **Phase 3 - Future**
- Advanced retry logic
- Difficulty adjustment
- Social features

## Kesimpulan

Sistem status yang baru memberikan:

1. **Clarity** - Status yang jelas dan mudah dipahami
2. **Flexibility** - Retry system yang user-friendly
3. **Motivation** - Badge system yang rewarding
4. **Progress** - Tracking yang comprehensive

Sistem ini akan meningkatkan user experience dan engagement secara signifikan.
