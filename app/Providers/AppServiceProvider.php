<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Rupiah
        Blade::directive('rupiah', function ($data) {
            return "Rp. <?php echo number_format($data, 0, ',', '.'); ?>";
        });

        // mengubah lokalisasi
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
    }
}
