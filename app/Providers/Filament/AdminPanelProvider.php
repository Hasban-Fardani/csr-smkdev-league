<?php

namespace App\Providers\Filament;

use App\Filament\Pages\AdminDashboard;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->databaseNotifications()
            ->login()
            ->colors([
                'primary' => '#98100A',
                'bandi-blue' => '#0098B0',
                'blaze-orange' => '#FF6E01'
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->topNavigation()
            ->brandLogo(asset('logos/logo-cirebon.png'))
            ->brandLogoHeight('3rem')
            ->brandName('Pemerintah Kabupaten Cirebon')
            ->favicon(asset('logos/logo-cirebon.png'))
            ->font('Inter')
            ->defaultThemeMode(ThemeMode::Light)
            ->discoverResources(
                in: app_path('Filament/Resources'), 
                for: 'App\\Filament\\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Pages'), 
                for: 'App\\Filament\\Pages'
            )
            ->pages([
                // AdminDashboard::class,
            ])
            ->discoverWidgets(
                in: app_path('Filament/Widgets'), 
                for: 'App\\Filament\\Widgets'
            )
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                // PanelsRenderHook::BODY_END,
                PanelsRenderHook::FOOTER,
                fn() => view('livewire.components.footer')
            );;
    }
}
