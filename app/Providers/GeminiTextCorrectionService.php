<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiTextCorrectionService extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(GeminiTextCorrectionService::class, function ($app) {
            return new GeminiTextCorrectionService($app);
        });
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

        /**
     * Corrects the given text using Google Gemini's API.
     *
     * @param string $text The text to be corrected.
     * @param string $model The Gemini model to use (e.g., "gemini-pro").  Defaults to "gemini-pro".
     * @param float $temperature The temperature for the model.  Defaults to 0.7.
     * @param int $maxOutputTokens Maximum number of tokens in the generated text. Defaults to 1024.
     * @return string|null The corrected text, or null on error.
     */
    public function correctText(string $text, string $model = 'gemini-1.5-pro-002', float $temperature = 0.7, int $maxOutputTokens = 1024): ?string
    {
        $apiKey = env('GEMINI_API_KEY'); // Retrieve API key from config file

        if (empty($apiKey)) {
            Log::error('Gemini API key is missing.  Please configure it in config/services.php.');
            return null;
        }

        $url = "https://generativelanguage.googleapis.com/v1/models/{$model}:generateContent?key={$apiKey}";

        $prompt = "Correct the following text for grammar, spelling, punctuation, and clarity.  Focus on making the text grammatically correct and easily understandable, without changing the original meaning. return the corrected text, the corrections made and give it a grade from 0 to 5.  Input: \n\n{$text}";

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $prompt,
                        ],
                    ],
                ],
            ],
            'generationConfig' => [
                'temperature' => $temperature,
                'maxOutputTokens' => $maxOutputTokens,
            ],
        ];

        try {
            Log::info('Sending request to Gemini API', ['url' => $url, 'payload' => $payload]);
            $response = Http::post($url, $payload);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Received successful response from Gemini API', ['response' => $data]);

                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    return trim($data['candidates'][0]['content']['parts'][0]['text']);
                } else {
                    Log::error('Gemini API response missing text: ' . json_encode($data));
                    return null;
                }
            } else {
                Log::error('Gemini API request failed: ' . $response->status() . ' - ' . $response->body());
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Gemini API request exception: ' . $e->getMessage());
            return null;
        }
    }
}
