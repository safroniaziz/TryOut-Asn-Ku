# Email Service Setup untuk ASN Ku

## Pilihan 1: Mailtrap (Recommended untuk Development)

### Setup Mailtrap:
1. Daftar di https://mailtrap.io (gratis)
2. Buat inbox baru
3. Salin credentials SMTP
4. Update file `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_FROM_ADDRESS="noreply@asnku.com"
MAIL_FROM_NAME="ASN Ku"
```

### Keuntungan Mailtrap:
- ✅ Gratis untuk development
- ✅ Email tidak benar-benar terkirim (aman untuk testing)
- ✅ Interface web untuk melihat email yang terkirim
- ✅ HTML preview dan spam analysis

---

## Pilihan 2: Gmail SMTP (Production)

### Setup Gmail:
1. Enable 2FA di Gmail Anda
2. Generate App Password:
   - Google Account → Security → 2-Step Verification → App passwords
   - Pilih "Mail" dan generate password
3. Update file `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_16_digit_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your_email@gmail.com"
MAIL_FROM_NAME="ASN Ku"
```

### Keuntungan Gmail:
- ✅ Gratis (dengan limit)
- ✅ Reliable dan fast delivery
- ✅ Good reputation

### Batasan Gmail:
- ⚠️ Limit 500 email/day untuk akun gratis
- ⚠️ Butuh setup App Password

---

## Pilihan 3: Mailgun (Production Scale)

### Setup Mailgun:
1. Daftar di https://mailgun.com
2. Verify domain Anda
3. Dapatkan API Key dan domain
4. Update file `.env`:

```env
MAIL_MAILER=mailgun
MAILGUN_DOMAIN=your-domain.com
MAILGUN_SECRET=your-api-key
MAIL_FROM_ADDRESS="noreply@your-domain.com"
MAIL_FROM_NAME="ASN Ku"
```

### Keuntungan Mailgun:
- ✅ 10,000 email gratis per bulan
- ✅ Excellent deliverability
- ✅ Advanced analytics
- ✅ Scalable

---

## Pilihan 4: AWS SES (Enterprise)

### Setup AWS SES:
1. Setup AWS account
2. Verify domain di SES
3. Generate access keys
4. Update file `.env`:

```env
MAIL_MAILER=ses
AWS_ACCESS_KEY_ID=your_access_key
AWS_SECRET_ACCESS_KEY=your_secret_key
AWS_DEFAULT_REGION=us-east-1
MAIL_FROM_ADDRESS="noreply@your-domain.com"
MAIL_FROM_NAME="ASN Ku"
```

---

## Quick Start (Development)

Untuk testing cepat, gunakan **Mailtrap**:

1. Daftar Mailtrap gratis
2. Copy paste credentials ke `.env`
3. Restart Laravel: `./vendor/bin/sail artisan config:cache`
4. Test kirim OTP

## Quick Start (Production)

Untuk production dengan Gmail:

1. Setup App Password di Gmail
2. Update `.env` dengan Gmail SMTP
3. Test dengan email sungguhan
4. Monitor delivery rate

---

## Testing Email

```bash
# Test API send OTP
curl -X POST "http://127.0.0.1:8020/api/email/send-otp" \
-H "Content-Type: application/json" \
-d '{"email": "test@example.com"}'

# Check Laravel logs untuk OTP
tail -f storage/logs/laravel.log
```

## Troubleshooting

1. **Email tidak terkirim**:
   - Cek `.env` configuration
   - Restart aplikasi: `./vendor/bin/sail artisan config:cache`
   - Cek logs: `storage/logs/laravel.log`

2. **Gmail authentication failed**:
   - Pastikan 2FA enabled
   - Gunakan App Password, bukan password biasa
   - Cek username/password benar

3. **Mailtrap tidak menerima email**:
   - Cek inbox yang benar
   - Refresh halaman Mailtrap
   - Cek credentials benar
