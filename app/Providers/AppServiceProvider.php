<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    // app/Providers/AuthServiceProvider.php

    protected $policies = [
        InformasiRencanaPerubahan::class => InformasiRencanaPerubahanPolicy::class,
    ];
    
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
