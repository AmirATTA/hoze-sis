<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Response::macro('success', function($message, $data = null, $httpCode = 200) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ], $httpCode);
        });
        
        Response::macro('error', function($message, $data = null, $httpCode = 400) {
            if ($httpCode == 422) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'data' => $data
                ], $httpCode);
            }

            return response()->json([
                'success' => false,
                'message' => $message,
                'data' => $data
            ], $httpCode);
        });
    }
}
