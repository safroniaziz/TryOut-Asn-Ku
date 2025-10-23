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
        
        if (!$token || !$sender) {
            Log::error('Fonnte configuration missing', [
                'token_exists' => !empty($token),
                'sender_exists' => !empty($sender)
            ]);
            return ['success' => false, 'error' => 'Fonnte configuration not found'];
        }

        $formattedPhone = self::formatPhoneNumber($phoneNumber);
        
        if (!self::validatePhoneNumber($phoneNumber)) {
            return ['success' => false, 'error' => 'Invalid phone number format'];
        }

        $message = "🔐 Kode verifikasi TryOut ASNku:\n\n*{$otpCode}*\n\nJangan bagikan kode ini kepada siapapun.\nBerlaku selama 10 menit.";

        try {
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->post('https://api.fonnte.com/send', [
                'target' => $formattedPhone,
                'message' => $message,
                'countryCode' => '62',
            ]);

            if ($response->successful()) {
                $responseData = $response->json();
                Log::info('WhatsApp OTP sent successfully', [
                    'phone' => $formattedPhone,
                    'response' => $responseData
                ]);
                return ['success' => true, 'data' => $responseData];
            } else {
                Log::error('Failed to send WhatsApp OTP', [
                    'phone' => $formattedPhone,
                    'status' => $response->status(),
                    'response' => $response->body()
                ]);
                return ['success' => false, 'error' => 'Failed to send OTP'];
            }
        } catch (\Exception $e) {
            Log::error('Exception while sending WhatsApp OTP', [
                'phone' => $formattedPhone,
                'error' => $e->getMessage()
            ]);
            return ['success' => false, 'error' => 'Service unavailable'];
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
                    // In production, prefer logging the reason instead of silent false.
                    return false;
                }

                $phone = $this->formatPhoneNumber($phone);

                $payload = [
                    'to' => $phone,
                    'from' => $sender,
                    'type' => 'text',
                    'text' => "Kode verifikasi Anda: {$otp}\nJangan bagikan kode ini kepada siapapun."
                ];

                try {
                    $response = $this->http->post('https://fonnte.id/api/messages', [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $apiKey,
                            'Accept' => 'application/json',
                            'Content-Type' => 'application/json'
                        ],
                        'json' => $payload,
                    ]);

                    $status = $response->getStatusCode();
                    return $status >= 200 && $status < 300;
                } catch (\Exception $e) {
                    // log error in production
                    return false;
                }
            }

            /**
             * Normalize Indonesian phone numbers to international format (62...)
             */
            protected function formatPhoneNumber(string $phone): string
            {
                $digits = preg_replace('/\D+/', '', $phone);
                if (strpos($digits, '0') === 0) {
                    $digits = '62' . ltrim($digits, '0');
                }
                return $digits;
            }

            protected function validatePhoneNumber(string $phone): bool
            {
                $digits = preg_replace('/\D+/', '', $phone);
                return strlen($digits) >= 9 && strlen($digits) <= 15;
            }
        }

    /**
     * Format phone number untuk WhatsApp
     */
    private static function formatPhoneNumber($phone, $format = 'indonesia')
    {
        // Remove all non-digits
        $phone = preg_replace('/[^0-9]/', '', $phone);
        
        if ($format === 'indonesia') {
            // Convert Indonesian numbers to proper format for Fonnte
            if (substr($phone, 0, 1) === '0') {
                // 08123456789 -> 628123456789
                $phone = '62' . substr($phone, 1);
            } elseif (substr($phone, 0, 2) !== '62') {
                // 8123456789 -> 628123456789
                $phone = '62' . $phone;
            }
        } else {
            // International format for Twilio
            if (substr($phone, 0, 1) === '0') {
                $phone = '62' . substr($phone, 1);
            } elseif (substr($phone, 0, 2) !== '62') {
                $phone = '62' . $phone;
            }
        }
        
        return $phone;
    }

    /**
     * Validate Indonesian phone number
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