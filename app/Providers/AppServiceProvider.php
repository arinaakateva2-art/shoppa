<?php

namespace App\Providers;

use App\Models\Category;
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

        view()->composer('layouts.navbar', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}