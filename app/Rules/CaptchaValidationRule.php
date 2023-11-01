<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CaptchaValidationRule implements Rule
{
    public function passes($attribute, $value)
    {
        if (env('HCAPTCHA_ENABLED')) {
            if (empty($value)) {
                return false; // Invalid Request
            }
            
            $data = [
                'secret' => env('HCAPTCHA_SECRET'),
                'response' => $value,
            ];

            try {

                $verify = curl_init();
                curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
                curl_setopt($verify, CURLOPT_POST, true);
                curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($verify);
                curl_close($verify);
    
                $reply = json_decode($response);
    
                if (!$reply || !$reply->success) {
                    return false; // Failed to verify as Human or check Captcha
                }

                return true; // Captcha is valid

            } catch(\Exception $e) {
                \Log::error("Failed to run verify captcha rule: " . $e->getMessage());
                return false; // Failed to verify as Human or check Captcha
            }



            return false; // Captcha is valid
        }

        return true; // If hCaptcha is not enabled, consider it valid
    }

    public function message()
    {
        return 'The :attribute could not be verified as a human or the captcha is invalid.';
    }
}
