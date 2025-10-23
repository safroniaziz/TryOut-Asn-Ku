<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    /**
     * Send OTP via WhatsApp
     */
    public static function sendOTP($phoneNumber, $otpCode)
    {
        $provider = config('app.whatsapp_provider', 'fonnte');
        
        return match($provider) {
            'fonnte' => self::sendViaFonnte($phoneNumber, $otpCode),
            'twilio' => self::sendViaTwilio($phoneNumber, $otpCode),
            default => ['success' => false, 'error' => "Unsupported WhatsApp provider: {$provider}"]
        };
    }

    /**
     * Send OTP via Fonnte (Indonesia)
     */
    private static function sendViaFonnte($phoneNumber, $otpCode)
    {
        $token = config('app.fonnte_token');
        $url = 'https://api.fonnte.com/send';
        
        if (!$token) {
            return ['success' => false, 'error' => 'Fonnte token not configured'];
        }
        
        // Format phone number
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

            Log::info("WhatsApp OTP attempt for {$phone}", [
                'status' => $response->status(),
                'response' => $response->json()
            ]);

            if ($response->successful()) {
                return ['success' => true, 'response' => $response->json()];
            } else {
                return ['success' => false, 'error' => $response->body()];
            }
        } catch (\Exception $e) {
            Log::error("WhatsApp OTP error: " . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Send OTP via Twilio (International)
     */
    private static function sendViaTwilio($phoneNumber, $otpCode)
    {
        // TODO: Implement Twilio WhatsApp API
        $accountSid = config('app.twilio_sid');
        $authToken = config('app.twilio_token');
        $fromNumber = config('app.twilio_whatsapp_from', 'whatsapp:+14155238886');
        
        if (!$accountSid || !$authToken) {
            return ['success' => false, 'error' => 'Twilio credentials not configured'];
        }

        $phone = self::formatPhoneNumber($phoneNumber, 'international');
        
        $message = "🔐 *ASN Ku Verification Code*\n\n";
        $message .= "Your OTP: *{$otpCode}*\n\n";
        $message .= "⏰ Valid for 3 minutes\n";
        $message .= "🚫 Don't share this code with anyone\n\n";
        $message .= "_Thank you - ASN Ku Team_";

        try {
            // Using Twilio REST API
            $url = "https://api.twilio.com/2010-04-01/Accounts/{$accountSid}/Messages.json";
            
            $response = Http::withBasicAuth($accountSid, $authToken)
                ->asForm()
                ->post($url, [
                    'From' => $fromNumber,
                    'To' => "whatsapp:+{$phone}",
                    'Body' => $message
                ]);

            if ($response->successful()) {
                return ['success' => true, 'response' => $response->json()];
            } else {
                return ['success' => false, 'error' => $response->body()];
            }
        } catch (\Exception $e) {
            Log::error("Twilio WhatsApp error: " . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
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