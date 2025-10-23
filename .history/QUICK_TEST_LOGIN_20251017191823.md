# 🧪 QUICK TEST - Login User

## ✅ Good News: Database Sudah Ada Test Users!

Anda punya 8 test users di database. Mari kita test login!

---

## 🎯 TEST USER CREDENTIALS

### User 1: Test User (VERIFIED)
```
Email: test@example.com
Password: password
Status: ✅ Email Verified
```

### User 2: John Doe Referrer
```
Email: referrer@asnku.com
Phone: 081234567890
Password: password123
Status: ⚠️ Not Verified (will need to verify)
Referral Code: REF2024JOHN
```

### User 3: Sarah Maharani
```
Email: sarah.test@asnku.com
Phone: 081298765432
Password: password123
Status: ⚠️ Not Verified
Referral Code: ASN2024SARAH
```

### User 4: Ahmad Budi
```
Email: ahmad.budi@asnku.com
Phone: 081387654321
Password: password123
Status: ⚠️ Not Verified
Referral Code: CPNS2024AHMAD
```

---

## 🚀 CARA TEST LOGIN (3 LANGKAH)

### Opsi A: Test dengan User yang Sudah Verified

#### Step 1: Buka Browser
```
http://localhost:8020/login
```

#### Step 2: Login dengan Test User
```
Email/Phone: test@example.com
Password: password
```

#### Step 3: Klik "Login"
**Expected Result:**
- ✅ Redirect ke: `http://localhost:8020/dashboard`
- ✅ Muncul welcome message: "Selamat datang kembali, Test User!"
- ✅ Tampil statistik user
- ✅ Tampil tryout terbaru
- ✅ Activity ter-log ke database

---

### Opsi B: Verify User Lain Dulu, Baru Test Login

Jika mau test dengan user lain (yang belum verified):

#### Step 1: Verify User via Tinker
```bash
./vendor/bin/sail artisan tinker
```

```php
// Verify Sarah
$user = \App\Models\User::where('email', 'sarah.test@asnku.com')->first();
$user->email_verified_at = now();
$user->phone_verified_at = now();
$user->save();

echo "✅ Sarah verified!";
exit;
```

#### Step 2: Login via Browser
```
http://localhost:8020/login

Email: sarah.test@asnku.com
Password: password123
```

---

### Opsi C: Create Fresh Test User

Jika mau user baru yang clean:

```bash
./vendor/bin/sail artisan tinker
```

```php
$user = \App\Models\User::create([
    'name' => 'Demo User',
    'email' => 'demo@asnku.com',
    'phone_number' => '081999888777',
    'password' => bcrypt('demo123'),
    'email_verified_at' => now(),
    'phone_verified_at' => now(),
    'my_referral_code' => 'DEMO2025',
]);

echo "✅ Demo user created!";
echo "Email: demo@asnku.com";
echo "Password: demo123";
exit;
```

**Then login:**
```
Email: demo@asnku.com
Password: demo123
```

---

## 🔍 CHECK ACTIVITY LOG

### After Login, Check Database

```bash
./vendor/bin/sail artisan tinker
```

```php
// Get latest login activity
$activity = \Spatie\Activitylog\Models\Activity::where('log_name', 'authentication')
    ->where('description', 'Pengguna berhasil masuk')
    ->latest()
    ->first();

if ($activity) {
    echo "✅ Login Logged Successfully!\n";
    echo "User: " . $activity->causer->name . "\n";
    echo "Email: " . $activity->causer->email . "\n";
    echo "IP: " . $activity->properties['ip_address'] . "\n";
    echo "Browser: " . $activity->properties['user_agent'] . "\n";
    echo "Time: " . $activity->created_at->diffForHumans() . "\n";
    
    // Show raw data
    print_r($activity->properties->toArray());
} else {
    echo "❌ No login activity found";
}
```

### Check via MySQL

```bash
./vendor/bin/sail mysql
```

```sql
-- Show latest activities
SELECT 
    id,
    log_name,
    description,
    causer_id,
    created_at
FROM activity_log
WHERE log_name = 'authentication'
ORDER BY created_at DESC
LIMIT 5;

-- Show login with user info
SELECT 
    a.id,
    a.description,
    u.name,
    u.email,
    a.properties,
    a.created_at
FROM activity_log a
JOIN users u ON a.causer_id = u.id
WHERE a.log_name = 'authentication'
ORDER BY a.created_at DESC
LIMIT 5;
```

---

## 🎨 WHAT YOU SHOULD SEE

### 1. Login Page
```
╔══════════════════════════════════════╗
║  [Logo] TryOut ASNku                 ║
║                                      ║
║  Masuk ke Akun Anda                  ║
║                                      ║
║  Email/Nomor HP:                     ║
║  [___________________________]       ║
║                                      ║
║  Password:                           ║
║  [___________________________] [👁]  ║
║                                      ║
║  [ ] Ingat saya                      ║
║                                      ║
║  [      MASUK      ]                 ║
║                                      ║
║  Lupa password? | Daftar             ║
╚══════════════════════════════════════╝
```

### 2. Dashboard After Login
```
╔═══════════════════════════════════════════════════════╗
║  🏠 Dashboard                                          ║
║  Selamat datang kembali, Test User!   [Upgrade Premium]║
╠═══════════════════════════════════════════════════════╣
║                                                        ║
║  🔥 PREMIUM BANNER (jika belum premium)               ║
║  Siap Lolos CPNS & PPPK? Buka Akses Premium!         ║
║  ✅ Pembahasan detail  ✅ Materi terbaru              ║
║  ✅ Download PDF       ✅ Leaderboard ranking          ║
║  [Buka Akses Premium]                                 ║
║                                                        ║
╠═══════════════════════════════════════════════════════╣
║  STATISTIK                                            ║
║  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────┐ ║
║  │📋 TryOut │ │📈 Rata2  │ │🏆 Best   │ │📥 Materi │ ║
║  │ Selesai  │ │  Skor    │ │  Score   │ │ Download │ ║
║  │    0     │ │   0.0    │ │    0     │ │    0     │ ║
║  └──────────┘ └──────────┘ └──────────┘ └──────────┘ ║
║                                                        ║
╠═══════════════════════════════════════════════════════╣
║  📝 TRYOUT TERBARU                                    ║
║  ┌─────────┐ ┌─────────┐ ┌─────────┐                 ║
║  │ Tryout  │ │ Tryout  │ │ Tryout  │                 ║
║  │   #1    │ │   #2    │ │   #3    │                 ║
║  │[Mulai]  │ │[Mulai]  │ │[Mulai]  │                 ║
║  └─────────┘ └─────────┘ └─────────┘                 ║
║                                                        ║
╠═══════════════════════════════════════════════════════╣
║  📚 MATERI TERBARU                                    ║
║  ┌─────────┐ ┌─────────┐ ┌─────────┐                 ║
║  │ Materi  │ │ Materi  │ │ Materi  │                 ║
║  │   #1    │ │   #2    │ │   #3    │                 ║
║  │[Lihat]  │ │[Lihat]  │ │[Lihat]  │                 ║
║  └─────────┘ └─────────┘ └─────────┘                 ║
║                                                        ║
╚═══════════════════════════════════════════════════════╝
```

---

## 🐛 TROUBLESHOOTING

### Problem: "These credentials do not match our records"

**Kemungkinan:**
1. Password salah
2. Email salah
3. User belum ada

**Solution:**
```bash
# Check user exists
./vendor/bin/sail mysql -e "SELECT email, name FROM users WHERE email='test@example.com';"

# Reset password
./vendor/bin/sail artisan tinker --execute="
\$user = \App\Models\User::where('email', 'test@example.com')->first();
if (\$user) {
    \$user->password = bcrypt('password');
    \$user->save();
    echo '✅ Password reset to: password';
} else {
    echo '❌ User not found';
}
"
```

---

### Problem: "Email address is not verified"

**Solution:**
```bash
./vendor/bin/sail artisan tinker --execute="
\$user = \App\Models\User::where('email', 'test@example.com')->first();
\$user->email_verified_at = now();
\$user->phone_verified_at = now();
\$user->save();
echo '✅ User verified!';
"
```

---

### Problem: "Too many login attempts"

**Solution:**
```bash
# Clear rate limiter
./vendor/bin/sail artisan cache:clear

# Or wait 60 seconds
```

---

### Problem: Dashboard shows 404

**Check:**
```bash
# Route exists?
./vendor/bin/sail artisan route:list | grep dashboard

# Controller exists?
ls -la app/Http/Controllers/DashboardController.php

# Clear cache
./vendor/bin/sail artisan route:clear
./vendor/bin/sail artisan config:clear
```

---

### Problem: Activity not logged

**Check:**
```bash
# Check activity_log table exists
./vendor/bin/sail mysql -e "SHOW TABLES LIKE 'activity_log';"

# Check ActivityLogService
./vendor/bin/sail artisan tinker --execute="
echo method_exists(\App\Services\ActivityLogService::class, 'logUserLogin') ? '✅ Method exists' : '❌ Method missing';
"

# Check config
./vendor/bin/sail artisan tinker --execute="
echo config('app.activity_logging_enabled', true) ? '✅ Logging enabled' : '❌ Logging disabled';
"
```

---

## 📊 EXPECTED ACTIVITY LOG

After successful login, you should see in database:

```sql
mysql> SELECT * FROM activity_log WHERE log_name='authentication' LIMIT 1\G
*************************** 1. row ***************************
           id: 1
     log_name: authentication
  description: Pengguna berhasil masuk
 subject_type: App\Models\User
   subject_id: 1
  causer_type: App\Models\User
    causer_id: 1
   properties: {
                 "user_id": 1,
                 "email": "test@example.com",
                 "phone_number": null,
                 "ip_address": "172.20.0.1",
                 "user_agent": "Mozilla/5.0...",
                 "login_method": "email",
                 "success": true
               }
   batch_uuid: NULL
        event: NULL
   created_at: 2025-10-17 12:00:00
   updated_at: 2025-10-17 12:00:00
```

---

## ✅ SUCCESS CHECKLIST

After login, verify:

- [ ] URL changed to: `http://localhost:8020/dashboard`
- [ ] Welcome message shows: "Selamat datang kembali, [Name]!"
- [ ] 4 statistic cards displayed
- [ ] TryOut section shows (even if empty)
- [ ] Materi section shows (even if empty)
- [ ] Navigation menu shows: Dashboard, TryOut, Materi, etc
- [ ] User profile visible in top-right corner
- [ ] Activity logged in database
- [ ] Can see activity in admin panel: `/admin/activity-logs`

---

## 🎯 QUICK TEST COMMANDS

### 1-Line Login Test:
```bash
# Login via tinker
./vendor/bin/sail artisan tinker --execute="
Auth::loginUsingId(1);
echo Auth::check() ? '✅ Login successful' : '❌ Login failed';
"
```

### Check Activity Logs:
```bash
./vendor/bin/sail mysql -e "
SELECT COUNT(*) as total_activities FROM activity_log;
SELECT COUNT(*) as auth_activities FROM activity_log WHERE log_name='authentication';
SELECT description, created_at FROM activity_log ORDER BY created_at DESC LIMIT 5;
"
```

### Full Test Script:
```bash
# Create + Verify + Login + Check
./vendor/bin/sail artisan tinker --execute="
// Get or create test user
\$user = \App\Models\User::firstOrCreate(
    ['email' => 'quicktest@asnku.com'],
    [
        'name' => 'Quick Test User',
        'phone_number' => '081999999999',
        'password' => bcrypt('test123'),
        'email_verified_at' => now(),
        'phone_verified_at' => now(),
        'my_referral_code' => 'QUICK2025'
    ]
);

// Login
Auth::login(\$user);

// Log the login
\App\Services\ActivityLogService::logUserLogin(\$user);

// Check
echo '✅ User created and logged in!';
echo 'Email: quicktest@asnku.com';
echo 'Password: test123';
echo 'Login status: ' . (Auth::check() ? 'LOGGED IN' : 'NOT LOGGED IN');

// Check activity
\$activity = \Spatie\Activitylog\Models\Activity::latest()->first();
echo 'Last activity: ' . \$activity->description;
"
```

---

## 🚀 READY TO TEST!

**Recommended Test Flow:**

1. **Quick Test (1 minute):**
   ```
   http://localhost:8020/login
   Email: test@example.com
   Password: password
   → Should work immediately
   ```

2. **Check Activity (30 seconds):**
   ```
   http://localhost:8020/admin/activity-logs
   → Should see login activity
   ```

3. **Explore Dashboard (2 minutes):**
   - Check all sections
   - Click through menus
   - Test navigation

**Total Test Time: ~3-4 minutes** ⏱️

---

**Happy Testing! 🎉**

Need help? Check: **LOGIN_FLOW_GUIDE.md** for detailed explanation.
