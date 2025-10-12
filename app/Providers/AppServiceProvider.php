<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        // Registrar componentes manualmente
        Blade::component('layouts.app', 'layouts-app');
        
        // Opcional: también puedes registrar otros componentes de layouts
        // Blade::component('layouts.admin', 'layouts-admin');
    }
}
