<?php

namespace SeavSeyla\ApiResponse;

use Illuminate\Support\ServiceProvider;

class ApiResponsePackageServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Publish config file if needed (optional)
        $this->publishes([
            __DIR__ . '/config/api-response.php' => config_path('api-response.php'),
        ], 'api-response-config');
    }
}
