<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class ReCaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Validate that the reCAPTCHA response is not empty
        if (empty($value)) {
            $fail('reCAPTCHA validation failed: No response token received.');
            return;
        }

        // Make a POST request to Google’s reCAPTCHA API
        $response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $value
        ])->json();
            //dd($response);
        // Check if reCAPTCHA validation was successful
        if (!isset($response["success"]) || !$response["success"]) {
            $fail('reCAPTCHA validation failed. Please try again.');
            return;
        }

        // (Optional) Check score for reCAPTCHA v3 (if using)
        if (isset($response["score"]) && $response["score"] < 0.5) {
            $fail('Suspicious activity detected. Please try again.');
            return;
        }
    }
}
