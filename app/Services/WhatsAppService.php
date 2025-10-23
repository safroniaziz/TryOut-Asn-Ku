<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class WhatsAppService
{
    /**
     * Send OTP via WhatsApp using Fonnte
     *
     * @param string $phoneNumber
     * @param string $otpCode
     * @return array
     */
    public static function sendOTP($phoneNumber, $otpCode)
    {
        $token = config('services.fonnte.token');
        $sender = config('services.fonnte.sender');
        $backupSender = config('services.fonnte.backup_sender');

        if (!$token) {
            Log::error('Fonnte token missing');
            return ['success' => false, 'error' => 'Fonnte configuration not found'];
        }

        $formattedPhone = self::formatPhoneNumber($phoneNumber);

        if (!self::validatePhoneNumber($phoneNumber)) {
            return ['success' => false, 'error' => 'Invalid phone number format'];
        }

        $message = self::generateOTPMessage($otpCode);

        // Add random delay to avoid predictable patterns (1-3 seconds)
        usleep(rand(1000000, 3000000)); // 1-3 seconds in microseconds

        // Try primary sender first
        $result = self::sendWithSender($formattedPhone, $message, $token, $sender);

        // If failed and backup sender available, try backup
        if (!$result['success'] && $backupSender) {
            Log::info('Primary sender failed, trying backup sender', [
                'primary_sender' => $sender,
                'backup_sender' => $backupSender
            ]);
            $result = self::sendWithSender($formattedPhone, $message, $token, $backupSender);
        }

        return $result;
    }

    /**
     * Generate varied OTP message templates to avoid spam detection
     */
    private static function generateOTPMessage($otpCode)
    {
        $templates = [
            "🔐 Kode verifikasi TryOut ASNku:\n\n*{$otpCode}*\n\nJangan bagikan kode ini kepada siapapun.\nBerlaku selama 10 menit.",

            "✅ Verifikasi akun TryOut ASNku\nKode OTP: *{$otpCode}*\n\nKode ini rahasia dan berlaku 10 menit.\nJangan berikan kepada orang lain.",

            "📱 TryOut ASNku - Kode Verifikasi\n\n*{$otpCode}*\n\nGunakan kode di atas untuk melanjutkan pendaftaran.\nKadaluarsa dalam 10 menit.",

            "🎯 Halo! Kode verifikasi Anda:\n*{$otpCode}*\n\nMasukkan kode ini untuk mengaktifkan akun TryOut ASNku.\nValid selama 10 menit.",

            "🚀 TryOut ASNku\nKode aktivasi: *{$otpCode}*\n\nJaga kerahasiaan kode ini.\nWaktu: 10 menit."
        ];

        // Pick random template
        $randomIndex = array_rand($templates);
        return $templates[$randomIndex];
    }

    /**
     * Send message with specific sender
     */
    private static function sendWithSender($phone, $message, $token, $sender)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->post('https://api.fonnte.com/send', [
                'target' => $phone,
                'message' => $message,
                'countryCode' => '62',
                'typing' => false,
                'preview' => false,
                'connectOnly' => true
            ]);

            if ($response->successful()) {
                $responseData = $response->json();

                // Check response status from Fonnte
                if (isset($responseData['status']) && $responseData['status'] === true) {
                    Log::info('WhatsApp OTP sent successfully', [
                        'phone' => $phone,
                        'sender' => $sender,
                        'response' => $responseData,
                        'detail' => $responseData['detail'] ?? 'No detail provided'
                    ]);
                    return ['success' => true, 'data' => $responseData];
                } else {
                    Log::error('Fonnte API returned false status', [
                        'phone' => $phone,
                        'sender' => $sender,
                        'response' => $responseData,
                        'reason' => $responseData['reason'] ?? 'Unknown reason'
                    ]);
                    return ['success' => false, 'error' => $responseData['reason'] ?? 'Failed to send OTP'];
                }
            } else {
                Log::error('Failed to send WhatsApp OTP - HTTP Error', [
                    'phone' => $phone,
                    'sender' => $sender,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return ['success' => false, 'error' => 'HTTP Error: ' . $response->status()];
            }
        } catch (\Exception $e) {
            Log::error('Exception while sending WhatsApp OTP', [
                'phone' => $phone,
                'sender' => $sender,
                'error' => $e->getMessage()
            ]);
            return ['success' => false, 'error' => 'Service unavailable: ' . $e->getMessage()];
        }
    }

    /**
     * Send notification via WhatsApp
     *
     * @param string $phoneNumber
     * @param string $message
     * @return array
     */
    public static function sendNotification($phoneNumber, $message)
    {
        $token = config('services.fonnte.token');

        if (!$token) {
            return ['success' => false, 'error' => 'Fonnte token not configured'];
        }

        $formattedPhone = self::formatPhoneNumber($phoneNumber);

        if (!self::validatePhoneNumber($phoneNumber)) {
            return ['success' => false, 'error' => 'Invalid phone number format'];
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->post('https://api.fonnte.com/send', [
                'target' => $formattedPhone,
                'message' => $message,
                'countryCode' => '62',
                'typing' => false,
                'preview' => true,
                'connectOnly' => true
            ]);

            if ($response->successful()) {
                $responseData = $response->json();

                if (isset($responseData['status']) && $responseData['status'] === true) {
                    Log::info('WhatsApp notification sent successfully', [
                        'phone' => $formattedPhone,
                        'response' => $responseData,
                        'detail' => $responseData['detail'] ?? 'No detail provided'
                    ]);
                    return ['success' => true, 'data' => $responseData];
                } else {
                    Log::error('Fonnte API returned false status for notification', [
                        'phone' => $formattedPhone,
                        'response' => $responseData,
                        'reason' => $responseData['reason'] ?? 'Unknown reason'
                    ]);
                    return ['success' => false, 'error' => $responseData['reason'] ?? 'Failed to send notification'];
                }
            } else {
                Log::error('Failed to send WhatsApp notification - HTTP Error', [
                    'phone' => $formattedPhone,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return ['success' => false, 'error' => 'HTTP Error: ' . $response->status()];
            }
        } catch (\Exception $e) {
            Log::error('Exception while sending WhatsApp notification', [
                'phone' => $formattedPhone,
                'error' => $e->getMessage()
            ]);
            return ['success' => false, 'error' => 'Service unavailable: ' . $e->getMessage()];
        }
    }

    /**
     * Format phone number untuk WhatsApp Indonesia (sesuai dokumentasi Fonnte)
     *
     * @param string $phone
     * @return string
     */
    private static function formatPhoneNumber($phone)
    {
        // Remove all non-digits
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Untuk Fonnte, biarkan countryCode '62' menangani formatting
        // Jadi kita hanya perlu pastikan format dimulai dengan 0 atau 8
        if (substr($phone, 0, 2) === '62') {
            // 628123456789 -> 08123456789 (biarkan Fonnte handle dengan countryCode)
            $phone = '0' . substr($phone, 2);
        } elseif (substr($phone, 0, 1) !== '0' && substr($phone, 0, 1) === '8') {
            // 8123456789 -> 08123456789
            $phone = '0' . $phone;
        }
        // Jika sudah 08123456789, biarkan apa adanya

        return $phone;
    }

    /**
     * Validate Indonesian phone number
     *
     * @param string $phone
     * @return bool
     */
    public static function validatePhoneNumber($phone)
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Indonesian mobile patterns
        $patterns = [
            '/^0811[0-9]{8,9}$/',  // Telkomsel
            '/^0812[0-9]{8,9}$/',  // Telkomsel
            '/^0813[0-9]{8,9}$/',  // Telkomsel
            '/^0821[0-9]{8,9}$/',  // Telkomsel
            '/^0822[0-9]{8,9}$/',  // Telkomsel
            '/^0852[0-9]{8,9}$/',  // Telkomsel
            '/^0853[0-9]{8,9}$/',  // Telkomsel
            '/^0815[0-9]{8,9}$/',  // Indosat
            '/^0816[0-9]{8,9}$/',  // Indosat
            '/^0855[0-9]{8,9}$/',  // Indosat
            '/^0856[0-9]{8,9}$/',  // Indosat
            '/^0857[0-9]{8,9}$/',  // Indosat
            '/^0858[0-9]{8,9}$/',  // Indosat
            '/^0817[0-9]{8,9}$/',  // XL
            '/^0818[0-9]{8,9}$/',  // XL
            '/^0819[0-9]{8,9}$/',  // XL
            '/^0859[0-9]{8,9}$/',  // XL
            '/^0877[0-9]{8,9}$/',  // XL
            '/^0878[0-9]{8,9}$/',  // XL
            '/^0896[0-9]{8,9}$/',  // Three
            '/^0897[0-9]{8,9}$/',  // Three
            '/^0898[0-9]{8,9}$/',  // Three
            '/^0899[0-9]{8,9}$/',  // Three
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $phone)) {
                return true;
            }
        }

        return false;
    }
}
