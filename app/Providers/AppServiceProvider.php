<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade; 
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Paginator::useBootstrap();

        Blade::directive('priceFormat', function ($price) {
            return "<?php echo number_format($price, 0, '', ' '); ?>";
        });
    }
}