# 📧 Email Setup untuk Production Hosting

## 🎯 **Recommended: External Email Services**

Untuk hosting biasa, gunakan **SMTP service eksternal** karena lebih reliable:

### 1. **Gmail SMTP** (Gratis - 500 email/day)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-16-digit-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="ASN Ku"
```

**Setup Gmail App Password:**
1. Enable 2FA di Google Account
2. Go to: Google Account → Security → 2-Step Verification → App passwords
3. Generate password untuk "Mail"
4. Gunakan 16-digit password itu

---

### 2. **Mailgun** (10,000 email gratis/bulan)

```env
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=mg.yourdomain.com
MAILGUN_SECRET=key-xxxxxxxxxxxxxxxx
MAILGUN_ENDPOINT=api.mailgun.net
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="ASN Ku"
```

**Setup Mailgun:**
1. Daftar di https://mailgun.com
2. Add & verify domain
3. Get API key dari dashboard
4. Setup DNS records (SPF, DKIM)

---

### 3. **SendGrid** (100 email gratis/day)

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=your-sendgrid-api-key
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="ASN Ku"
```

---

### 4. **AWS SES** (Pay per use, sangat murah)

```env
MAIL_MAILER=ses
AWS_ACCESS_KEY_ID=your-access-key
AWS_SECRET_ACCESS_KEY=your-secret-key
AWS_DEFAULT_REGION=us-east-1
MAIL_FROM_ADDRESS="noreply@yourdomain.com"
MAIL_FROM_NAME="ASN Ku"
```

---

## 🏠 **Hosting Provider Specific**

### **Shared Hosting (Hostinger, Niagahoster, dll)**
- ✅ Bisa pakai Gmail SMTP
- ✅ Bisa pakai Mailgun  
- ❌ Jangan pakai built-in mail() function
- ⚠️ Pastikan port 587/465 tidak diblokir

### **VPS (DigitalOcean, Linode, Vultr)**
- ✅ Install mail server sendiri
- ✅ Gunakan external SMTP (recommended)
- ✅ Setup firewall untuk port email

### **Cloud Hosting (AWS, Google Cloud, Azure)**
- ✅ Gunakan native service (SES, SendGrid)
- ✅ Managed email service
- ✅ Auto-scaling

---

## ⚙️ **Setup di Laravel untuk Production**

1. **Update .env di production:**
```bash
# Pilih salah satu service di atas
MAIL_MAILER=smtp
# ... config sesuai provider
```

2. **Clear cache setelah update:**
```bash
php artisan config:cache
php artisan queue:restart  # Jika pakai queue
```

3. **Test email:**
```bash
php artisan tinker
Mail::raw('Test email', function($msg) { 
    $msg->to('test@example.com')->subject('Test'); 
});
```

---

## 🔒 **Security Best Practices**

### **Environment Variables**
- ✅ Jangan commit .env ke Git
- ✅ Gunakan environment variables di hosting panel
- ✅ Rotate API keys secara berkala

### **Rate Limiting**
```php
// Add to EmailVerificationController
use Illuminate\Support\Facades\RateLimiter;

public function sendOTP(Request $request)
{
    $email = $request->email;
    
    // Rate limit: 3 attempts per 10 minutes per email
    $key = 'send-otp:' . $email;
    
    if (RateLimiter::tooManyAttempts($key, 3)) {
        $seconds = RateLimiter::availableIn($key);
        return response()->json([
            'success' => false,
            'message' => "Terlalu banyak percobaan. Coba lagi dalam {$seconds} detik."
        ], 429);
    }
    
    RateLimiter::hit($key, 600); // 10 minutes
    
    // ... rest of code
}
```

---

## 🧪 **Testing di Production**

### **Step by step:**
1. Deploy ke hosting
2. Update .env dengan SMTP config  
3. Test dengan email sungguhan:
```bash
curl -X POST "https://yourdomain.com/api/email/send-otp" \
-H "Content-Type: application/json" \
-d '{"email": "your-real-email@gmail.com"}'
```
4. Cek email masuk (termasuk spam folder)
5. Test verifikasi OTP

### **Troubleshooting:**
- ❌ Email tidak terkirim → Cek logs Laravel
- ❌ Masuk spam → Setup SPF/DKIM records  
- ❌ SMTP error → Cek firewall/port hosting
- ❌ Rate limit → Implement rate limiting

---

## 💰 **Biaya Perbandingan**

| Service | Free Tier | Paid Plan | Kelebihan |
|---------|-----------|-----------|-----------|
| **Gmail SMTP** | 500/day | - | Mudah setup |
| **Mailgun** | 10k/month | $35/month (50k) | Reliable, analytics |
| **SendGrid** | 100/day | $15/month (40k) | Good dashboard |
| **AWS SES** | 62k/month | $0.10/1000 | Sangat murah, scalable |

---

## 🎯 **Rekomendasi untuk ASN Ku**

### **Development:**
```env
MAIL_MAILER=log  # Test di local
```

### **Small Scale (< 1000 users):**
```env
# Gmail SMTP - Gratis & mudah
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
```

### **Medium Scale (1000-10k users):**
```env  
# Mailgun - Professional
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=mg.asnku.com
```

### **Large Scale (10k+ users):**
```env
# AWS SES - Scalable & murah  
MAIL_MAILER=ses
AWS_ACCESS_KEY_ID=xxx
```