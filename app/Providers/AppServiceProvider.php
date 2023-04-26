<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
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
     * Bootstrap any application services.W
     *
     * @return void
     */
    public function boot()
    {
        // custom menu per utente
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Profilo')
                    ->url(route('filament.pages.profilo'))
                    ->icon('heroicon-s-cog'),
                // ...
            ]);
        });

        Filament::registerScripts([
            'https://s3.amazonaws.com/download.dymo.com/dymo/Software/JavaScript/dymo.connect.framework.js',
        ], true);
    }
}
