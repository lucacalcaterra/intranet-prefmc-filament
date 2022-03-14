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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // custom menu per utente
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Settings')
                    ->url(route('filament.resources.users.edit', 1))
                    ->icon('heroicon-s-cog'),
                // ...
            ]);
        });
    }
}
