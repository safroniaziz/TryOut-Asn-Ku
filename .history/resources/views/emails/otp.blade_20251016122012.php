<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode Verifikasi Email - ASN Ku</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            color: #2563eb;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .title {
            color: #1f2937;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .otp-code {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 8px;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin: 30px 0;
            font-family: 'Courier New', monospace;
        }
        .message {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        .warning {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            font-size: 14px;
            color: #6b7280;
        }
        .support-info {
            background-color: #f3f4f6;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🏛️ ASN Ku</div>
            <div class="title">Verifikasi Email Anda</div>
        </div>

        <div class="message">
            Halo,<br><br>
            Terima kasih telah mendaftar di <strong>ASN Ku</strong>! Untuk melanjutkan proses pendaftaran, silakan verifikasi email Anda dengan menggunakan kode OTP berikut:
        </div>

        <div class="otp-code">
            {{ $otp_code }}
        </div>

        <div class="message">
            Masukkan kode tersebut di halaman pendaftaran untuk melanjutkan ke langkah berikutnya.
        </div>

        <div class="warning">
            <strong>⚠️ Penting:</strong>
            <ul style="margin: 5px 0; padding-left: 20px;">
                <li>Kode OTP berlaku selama <strong>10 menit</strong></li>
                <li>Jangan bagikan kode ini kepada siapa pun</li>
                <li>Jika Anda tidak melakukan pendaftaran, abaikan email ini</li>
            </ul>
        </div>

        <div class="support-info">
            <strong>Butuh bantuan?</strong><br>
            Jika Anda mengalami masalah atau tidak menerima kode OTP, silakan hubungi tim support kami di:
            <br>
            📧 Email: support@asnku.com<br>
            📱 WhatsApp: +62 812-3456-7890
        </div>

        <div class="footer">
            Email ini dikirim secara otomatis, mohon tidak membalas email ini.<br>
            © {{ date('Y') }} ASN Ku. All rights reserved.<br>
            <small>Email dikirim ke: {{ $email }}</small>
        </div>
    </div>
</body>
</html>