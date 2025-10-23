# 🔐 ALUR LOGIN USER - Complete Flow & Algorithm

## 📋 Overview

Ketika user login, ini yang terjadi:

**Login → Authenticate → Activity Log → Redirect ke Dashboard**

---

## 🔄 ALUR LOGIN LENGKAP

### 1️⃣ **User Mengakses Halaman Login**

```
URL: http://localhost:8020/login
Route: GET /login
Controller: AuthenticatedSessionController@create
View: resources/views/auth/login.blade.php
```

**Yang Terjadi:**
- User membuka form login
- Form meminta email/phone dan password
- Ada link "Lupa password?" dan "Belum punya akun?"

---

### 2️⃣ **User Submit Form Login**

```
URL: POST http://localhost:8020/login
Route: POST /login
Controller: AuthenticatedSessionController@store
Request Validator: LoginRequest
```

**Flow di Controller:**

```php
// File: app/Http/Controllers/Auth/AuthenticatedSessionController.php

public function store(LoginRequest $request): RedirectResponse
{
    // STEP 1: Authenticate user (cek email/phone + password)
    $request->authenticate();
    
    // STEP 2: Regenerate session (security - prevent session fixation)
    $request->session()->regenerate();
    
    // STEP 3: Log activity (ACTIVITY LOGGING!)
    ActivityLogService::logUserLogin(Auth::user(), true, 'email');
    
    // STEP 4: Redirect ke dashboard
    return redirect()->intended(route('dashboard', absolute: false));
}
```

---

### 3️⃣ **Proses Authenticate (LoginRequest)**

```php
// File: app/Http/Requests/Auth/LoginRequest.php

public function authenticate(): void
{
    // 1. Rate limiting check (5 attempts per minute)
    $this->ensureIsNotRateLimited();
    
    // 2. Attempt login dengan credentials
    if (! Auth::attempt($this->only('login', 'password'), $this->boolean('remember'))) {
        // GAGAL: Increment failed attempts
        RateLimiter::hit($this->throttleKey());
        
        throw ValidationException::withMessages([
            'login' => trans('auth.failed'),
        ]);
    }
    
    // BERHASIL: Clear rate limiter
    RateLimiter::clear($this->throttleKey());
}
```

**Login Field:**
- Bisa pakai **email** ATAU **phone number**
- Password di-hash (bcrypt)
- Remember me checkbox (optional)

---

### 4️⃣ **Activity Logging (Automatic)**

```php
// Logged automatically setelah login berhasil
ActivityLogService::logUserLogin(Auth::user(), true, 'email');
```

**Data yang Disimpan:**
```php
[
    'user_id' => $user->id,
    'email' => $user->email,
    'phone_number' => $user->phone_number,
    'ip_address' => Request::ip(),           // IP user
    'user_agent' => Request::userAgent(),    // Browser info
    'login_method' => 'email',               // atau 'phone'
    'success' => true,
    'timestamp' => now()
]

Description: "Pengguna berhasil masuk"
Log Name: "authentication"
```

---

### 5️⃣ **Redirect ke Dashboard**

```
URL: http://localhost:8020/dashboard
Route: GET /dashboard
Middleware: auth, verified
Controller: DashboardController@index
View: resources/views/dashboard.blade.php
```

**Yang Ditampilkan di Dashboard:**

#### A. **Header Section**
- Welcome message: "Selamat datang kembali, [Nama User]!"
- Button "Upgrade Premium" (jika belum premium)

#### B. **Banner Premium** (jika belum premium)
- Highlight benefit premium:
  - ✅ Pembahasan detail semua soal
  - ✅ Materi terbaru CPNS & PPPK
  - ✅ File PDF bisa di-download
  - ✅ Ranking untuk ukur kemampuan
- Button "Buka Akses Premium"

#### C. **Status Premium** (jika sudah premium)
- Status: "Premium Aktif" dengan icon crown
- Berlaku hingga: [tanggal]
- Sisa waktu: [X] hari
- Progress bar: [%] tersisa

#### D. **Statistik Cards** (4 Cards)
1. **TryOut Selesai**
   - Icon: Clipboard check
   - Count: Jumlah tryout yang sudah dikerjakan
   - Color: Blue

2. **Rata-rata Skor**
   - Icon: Chart line
   - Score: Average score semua tryout
   - Color: Green

3. **Skor Tertinggi**
   - Icon: Trophy
   - Score: Best score
   - Color: Yellow/Gold

4. **Materi Diunduh**
   - Icon: Download
   - Count: Total material downloads
   - Color: Purple

#### E. **TryOut Terbaru** (6 cards)
- Grid 3 columns (responsive)
- Menampilkan 6 tryout terbaru
- Info: Nama, jumlah soal, durasi
- Button "Mulai Tryout"

#### F. **TryOut Saya** (History)
- List 5 tryout terakhir yang sudah dikerjakan
- Menampilkan: nama tryout, skor, tanggal
- Progress bar untuk visualisasi skor

#### G. **Materi Terbaru** (6 cards)
- Grid 3 columns
- Menampilkan 6 materi terbaru
- Info: Judul, tryout terkait, icon PDF/Video
- Button "Lihat Materi" atau "Premium" (jika belum premium)

---

## 🔒 SECURITY FEATURES

### 1. **Rate Limiting**
```php
// Maximum 5 login attempts per minute per IP/email
RateLimiter::for('login', function (Request $request) {
    return Limit::perMinute(5)->by($request->input('email').$request->ip());
});
```

**Jika Exceed:**
- Error: "Too many login attempts. Please try again in [seconds] seconds."
- User harus tunggu 60 detik

### 2. **Session Regeneration**
```php
$request->session()->regenerate();
```
**Tujuan:** Prevent session fixation attack

### 3. **Password Hashing**
- Algorithm: bcrypt
- Cost: 12 (default Laravel)
- Tidak pernah store plain password

### 4. **CSRF Protection**
- Setiap form punya CSRF token
- Validated automatically oleh middleware

### 5. **Activity Logging**
- Setiap login tercatat (IP, user agent, timestamp)
- Bisa track jika ada login mencurigakan
- Admin bisa monitor di `/admin/activity-logs`

---

## 📊 FLOWCHART ALGORITHM

```
START
  ↓
[User buka /login]
  ↓
[Tampilkan form login]
  ↓
[User input email/phone + password]
  ↓
[User klik "Login"]
  ↓
[POST /login → AuthenticatedSessionController]
  ↓
[Validate input (LoginRequest)]
  ↓
[Check rate limiting]
  ├─ Exceeded? → [Error: Too many attempts] → END
  └─ OK → Continue
  ↓
[Attempt authentication]
  ├─ Auth::attempt(credentials)
  ↓
[Credentials valid?]
  ├─ NO → [Increment failed attempts]
  │        ↓
  │       [Error: Invalid credentials] → END
  │
  └─ YES → [Clear rate limiter]
           ↓
          [Regenerate session]
           ↓
          [Log activity: "Pengguna berhasil masuk"]
           ↓
          [Middleware: LogUserActivity AUTO-LOG semua aktivitas selanjutnya]
           ↓
          [Redirect to /dashboard]
           ↓
          [DashboardController@index]
           ↓
          [Load data:]
           - User info
           - Premium status
           - Statistics (tryouts, scores)
           - Recent tryouts
           - User history
           - Recent materials
           ↓
          [Render dashboard.blade.php]
           ↓
          [User sees Dashboard]
           ↓
END
```

---

## 🎯 MIDDLEWARE CHAIN

Setelah login, setiap request melalui middleware:

```php
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])  // Laravel default
    ->middleware('web')                 // Session, CSRF, cookies
    ->middleware(LogUserActivity::class) // AUTO-LOG activity
    ->name('dashboard');
```

**Middleware Order:**
1. **web** - Session, cookies, CSRF
2. **auth** - Cek user sudah login
3. **verified** - Cek email/phone sudah verified
4. **LogUserActivity** - AUTO-LOG semua yang user lakukan

---

## 🔍 CARA TEST LOGIN

### Option 1: Manual Test via Browser

**Step 1: Buka Browser**
```
http://localhost:8020/login
```

**Step 2: Register User Baru (jika belum ada)**
```
http://localhost:8020/register
```
- Isi form: nama, email, phone, password
- Verifikasi OTP (via WhatsApp/skip jika development)

**Step 3: Login**
- Email/Phone: user@example.com atau 081234567890
- Password: password123
- Klik "Login"

**Step 4: Verify Redirect**
- Should redirect to: `http://localhost:8020/dashboard`
- Should see: Welcome message, stats, tryouts

### Option 2: Test via Tinker

```bash
./vendor/bin/sail artisan tinker
```

```php
// Create test user
$user = \App\Models\User::factory()->create([
    'name' => 'Test User',
    'email' => 'test@example.com',
    'phone_number' => '081234567890',
    'password' => bcrypt('password123'),
    'email_verified_at' => now(),
    'phone_verified_at' => now()
]);

// Login programmatically
Auth::login($user);

// Check if logged in
Auth::check(); // Should return: true

// Get current user
Auth::user(); // Should return user object

// Check activity log
\Spatie\Activitylog\Models\Activity::where('log_name', 'authentication')
    ->where('causer_id', $user->id)
    ->latest()
    ->first();
```

### Option 3: Test with cURL

```bash
# Step 1: Get CSRF token (visit login page first)
curl -c cookies.txt http://localhost:8020/login

# Step 2: Login
curl -b cookies.txt -c cookies.txt \
  -X POST http://localhost:8020/login \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "email=test@example.com&password=password123&_token=YOUR_CSRF_TOKEN"

# Step 3: Access dashboard
curl -b cookies.txt http://localhost:8020/dashboard
```

---

## 🐛 TROUBLESHOOTING

### Problem 1: "Email/Phone not verified"
**Solution:**
```php
// Via tinker
$user = \App\Models\User::where('email', 'test@example.com')->first();
$user->email_verified_at = now();
$user->phone_verified_at = now();
$user->save();
```

### Problem 2: "Too many login attempts"
**Solution:**
```php
// Clear rate limiter
\Illuminate\Support\Facades\RateLimiter::clear('login|test@example.com|127.0.0.1');
```

### Problem 3: "Redirect to /dashboard but shows 404"
**Check:**
```bash
# Verify route exists
./vendor/bin/sail artisan route:list | grep dashboard

# Clear route cache
./vendor/bin/sail artisan route:clear

# Check DashboardController exists
ls -la app/Http/Controllers/DashboardController.php
```

### Problem 4: "Dashboard shows error"
**Check:**
```bash
# Check logs
./vendor/bin/sail artisan tail

# Or
cat storage/logs/laravel.log | tail -50
```

---

## 📝 FILES INVOLVED

### Backend:
```
app/Http/Controllers/Auth/AuthenticatedSessionController.php  (Login logic)
app/Http/Controllers/DashboardController.php                  (Dashboard data)
app/Http/Requests/Auth/LoginRequest.php                       (Validation)
app/Services/ActivityLogService.php                           (Activity logging)
app/Http/Middleware/LogUserActivity.php                       (Auto-log middleware)
```

### Frontend:
```
resources/views/auth/login.blade.php                          (Login form)
resources/views/dashboard.blade.php                           (Dashboard view)
resources/views/layouts/app.blade.php                         (Main layout)
```

### Routes:
```
routes/auth.php                                               (Auth routes)
routes/web.php                                                (Dashboard route)
```

### Database:
```
users table                                                   (User data)
activity_log table                                            (Login history)
subscriptions table                                           (Premium status)
leaderboards table                                            (Tryout results)
```

---

## ✅ EXPECTED BEHAVIOR

**After Successful Login:**

1. ✅ User authenticated (session created)
2. ✅ Activity logged to database:
   - Description: "Pengguna berhasil masuk"
   - IP address recorded
   - User agent recorded
   - Timestamp recorded
3. ✅ Redirected to `/dashboard`
4. ✅ Dashboard shows:
   - Welcome message with user name
   - Premium banner/status
   - User statistics (4 cards)
   - Recent tryouts (6 cards)
   - User history (last 5 tryouts)
   - Recent materials (6 cards)
5. ✅ All subsequent actions auto-logged by middleware
6. ✅ Navigation menu shows:
   - Dashboard
   - TryOut
   - Materi
   - Leaderboard
   - Profil
   - Logout

---

## 🎓 SUMMARY

**Login Flow:**
```
Login Form → Validate → Authenticate → Log Activity → Dashboard
```

**Key Points:**
- ✅ Login supports email OR phone number
- ✅ Rate limiting: 5 attempts/minute
- ✅ Auto activity logging
- ✅ Session regeneration for security
- ✅ Redirect to dashboard with full data
- ✅ Auto-log semua aktivitas post-login
- ✅ Premium status detection
- ✅ User statistics calculated
- ✅ Recent content loaded

**Dashboard URL:**
```
http://localhost:8020/dashboard
```

**Activity Log URL (Admin):**
```
http://localhost:8020/admin/activity-logs
```

---

**Ready to test! 🚀**

Sekarang Anda bisa:
1. Buka: http://localhost:8020/register (buat user baru)
2. Atau buka: http://localhost:8020/login (jika sudah punya user)
3. Login dengan credentials
4. Will redirect to: http://localhost:8020/dashboard

**All activity automatically logged!** 📊
