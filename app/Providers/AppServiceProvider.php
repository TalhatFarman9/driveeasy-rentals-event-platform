<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Render serves the site over https, so Laravel must create https links
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Plain pagination markup that we style in public/css/app.css
        Paginator::useBootstrapFour();
    }
}
