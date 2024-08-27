<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;

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
        Gate::define('admin', function (User $user) {
            return $user->role == 'admin';
        });

        Gate::define('partner', function (User $user) {
            return $user->role == 'partner';
        });

        if($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        FilamentAsset::register([
            Css::make('custom-stylesheet', __DIR__ . asset('css/custom.css')),
        ]);
    }
}
