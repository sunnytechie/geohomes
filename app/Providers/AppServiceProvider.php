<?php

namespace App\Providers;

use App\Models\About;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        // Fetch the about information from the database
        $aboutInfo = About::first(['phone', 'email']);

        // Check if the About record exists before sharing data
        if ($aboutInfo) {
            // Share the data with all views
            view()->share('aboutInfo', $aboutInfo);
        } else {
            // Handle the case where About record is not found
            // You might log an error or set default values
            view()->share('aboutInfo', ['phone' => 'N/A', 'email' => 'N/A']);
        }


        Schema::defaultStringLength(191);
    }
}
