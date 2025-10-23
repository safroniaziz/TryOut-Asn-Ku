# 📱 WhatsApp OTP Setup untuk ASN Ku

## 🎯 **WhatsApp OTP Services Comparison**

| Service | Harga | Setup | Kelebihan |
|---------|-------|-------|-----------|
| **Fonnte** | Rp 50-100/pesan | Mudah | Indonesia, support bagus |
| **Twilio** | $0.005/pesan | Medium | Global, reliable |
| **Wablas** | Rp 75/pesan | Mudah | Indonesia, fitur lengkap |
| **WA Business API** | Varies | Sulit | Official tapi kompleks |

---

## 🚀 **Recommended: Fonnte**

### **Setup Fonnte:**

1. **Daftar di https://fonnte.com**
2. **Beli paket** (mulai Rp 100rb untuk 2000 pesan)
3. **Dapatkan API Token**
4. **Connect WhatsApp number**

### **Pricing Fonnte:**
- Starter: Rp 100,000 → 2000 pesan
- Basic: Rp 200,000 → 5000 pesan  
- Pro: Rp 500,000 → 15000 pesan

---

## ⚙️ **Laravel Implementation**

### **1. Install HTTP Client (sudah ada di Laravel):**
```bash
# Laravel sudah include Guzzle HTTP
composer require guzzlehttp/guzzle  # Jika belum ada
```

### **2. Environment Variables:**
```env
# WhatsApp OTP via Fonnte
WHATSAPP_OTP_PROVIDER=fonnte
FONNTE_API_TOKEN=your-fonnte-api-token
FONNTE_API_URL=https://api.fonnte.com/send

# Atau via Twilio
WHATSAPP_OTP_PROVIDER=twilio
TWILIO_ACCOUNT_SID=your-account-sid
TWILIO_AUTH_TOKEN=your-auth-token
TWILIO_WHATSAPP_FROM=whatsapp:+14155238886
```

### **3. WhatsApp Service Class:**
```php
<?php
// app/Services/WhatsAppService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    public static function sendOTP($phoneNumber, $otpCode)
    {
        $provider = config('services.whatsapp.provider', 'fonnte');
        
        return match($provider) {
            'fonnte' => self::sendViaFonnte($phoneNumber, $otpCode),
            'twilio' => self::sendViaTwilio($phoneNumber, $otpCode),
            default => throw new \Exception("Unsupported WhatsApp provider: {$provider}")
        };
    }

    private static function sendViaFonnte($phoneNumber, $otpCode)
    {
        $token = config('services.whatsapp.fonnte.token');
        $url = config('services.whatsapp.fonnte.url');
        
        // Format phone number (remove +, ensure starts with 62 for Indonesia)
        $phone = self::formatPhoneNumber($phoneNumber);
        
        $message = "🔐 *Kode Verifikasi ASN Ku*\n\n";
        $message .= "Kode OTP Anda: *{$otpCode}*\n\n";
        $message .= "⏰ Berlaku selama 3 menit\n";
        $message .= "🚫 Jangan bagikan kode ini kepada siapa pun\n\n";
        $message .= "Jika Anda tidak melakukan pendaftaran, abaikan pesan ini.\n\n";
        $message .= "_Terima kasih - Tim ASN Ku_";

        try {
            $response = Http::withHeaders([
                'Authorization' => $token
            ])->post($url, [
                'target' => $phone,
                'message' => $message,
                'countryCode' => '62'
            ]);

            if ($response->successful()) {
                Log::info("WhatsApp OTP sent successfully to {$phone}");
                return ['success' => true, 'response' => $response->json()];
            } else {
                Log::error("Failed to send WhatsApp OTP: " . $response->body());
                return ['success' => false, 'error' => $response->body()];
            }
        } catch (\Exception $e) {
            Log::error("WhatsApp OTP error: " . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    private static function sendViaTwilio($phoneNumber, $otpCode)
    {
        // Implement Twilio WhatsApp API
        // Similar structure but using Twilio endpoints
    }

    private static function formatPhoneNumber($phone)
    {
        // Remove all non-digits
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        // Convert Indonesian numbers to international format
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        } elseif (substr($phone, 0, 2) !== '62') {
            $phone = '62' . $phone;
        }
        
        return $phone;
    }
}
```

---

## 📱 **Frontend Changes**

### **1. Update Registration Form:**
```html
<!-- Change email field to phone field -->
<div class="space-y-2">
    <label for="phone" class="block text-sm font-semibold text-gray-700">
        Nomor WhatsApp <span class="text-red-500">*</span>
    </label>
    <div class="flex gap-2">
        <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" required
               class="flex-1 px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl"
               placeholder="08123456789">
        <button type="button" id="sendOtpBtn"
                class="px-4 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700"
                disabled>
            Kirim OTP
        </button>
    </div>
    <p class="text-xs text-gray-600">
        Masukkan nomor WhatsApp aktif untuk verifikasi
    </p>
</div>
```

### **2. Update JavaScript:**
```javascript
// Change email validation to phone validation
phoneInput.addEventListener('input', function() {
    const phone = this.value.trim();
    const isValidPhone = /^(\+62|62|0)[0-9]{9,13}$/.test(phone);
    sendOtpBtn.disabled = !isValidPhone;
});

// Update API call
fetch('/api/whatsapp/send-otp', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
    body: JSON.stringify({ phone: phone })
})
```

---

## 🔗 **API Routes Update**

```php
// routes/web.php
Route::post('/api/whatsapp/send-otp', [WhatsAppVerificationController::class, 'sendOTP'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('api.whatsapp.send-otp');

Route::post('/api/whatsapp/verify-otp', [WhatsAppVerificationController::class, 'verifyOTP'])
    ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class])
    ->name('api.whatsapp.verify-otp');
```

---

## 💰 **Cost Analysis**

### **Email vs WhatsApp:**

| Method | Cost per OTP | Pros | Cons |
|--------|-------------|------|------|
| **Email** | Gratis (Gmail) | Free, reliable | Spam, tidak semua buka email |
| **WhatsApp** | Rp 50-100 | High open rate, familiar | Biaya per pesan |

### **WhatsApp ROI:**
- Open rate: ~95% (vs Email ~20%)
- User completion rate lebih tinggi
- Biaya Rp 100/OTP vs acquisition cost user

---

## 🎯 **Hybrid Solution: Email + WhatsApp**

Bisa juga implementasi **pilihan user**:

```html
<div class="space-y-4">
    <label class="block text-sm font-semibold text-gray-700">
        Metode Verifikasi <span class="text-red-500">*</span>
    </label>
    
    <div class="flex space-x-4">
        <label class="flex items-center">
            <input type="radio" name="verification_method" value="email" checked>
            <span class="ml-2">📧 Email</span>
        </label>
        <label class="flex items-center">
            <input type="radio" name="verification_method" value="whatsapp">
            <span class="ml-2">📱 WhatsApp</span>
        </label>
    </div>
    
    <!-- Show email or phone input based on selection -->
    <div id="emailInput">...</div>
    <div id="phoneInput" class="hidden">...</div>
</div>
```

---

## 🚀 **Quick Start WhatsApp OTP**

1. **Daftar Fonnte** → dapat API token
2. **Update .env:**
```env
WHATSAPP_OTP_PROVIDER=fonnte
FONNTE_API_TOKEN=your-token
```
3. **Test API:**
```bash
curl -X POST "http://localhost:8020/api/whatsapp/send-otp" \
-d '{"phone": "08123456789"}'
```

**Mau saya implementasikan WhatsApp OTP sepenuhnya atau tetap hybrid (email + WA)?** 🤔