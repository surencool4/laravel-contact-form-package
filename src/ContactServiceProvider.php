<?php

namespace Surencool4\Contact;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
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
        //php artisan vendor:publish to view config and select below config and hit enter for use.
        $this->publishes([
            __DIR__.'/../config/config.php'=>config_path('contact.php')
        ], 'contact-config'); 
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'contact');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
