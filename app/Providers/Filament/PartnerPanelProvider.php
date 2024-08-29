<?php

namespace App\Providers\Filament;

use App\Filament\Auth\RegisterSeller;
use Filament\Enums\ThemeMode;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class PartnerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('partner')
            ->path('mitra')
            ->colors([
                // color from figma design
                'primary' => '#98100A',
                'bandi-blue' => '#0098B0',
                'blaze-orange' => '#FF6E01'
            ])
            ->login()
            ->registration(RegisterSeller::class)
            ->emailVerification()
            ->topNavigation()
            ->brandLogo(asset('logos/logo-cirebon.png'))
            ->brandLogoHeight('3rem')
            ->brandName('Pemerintah Kabupaten Cirebon')
            ->favicon(asset('logos/logo-cirebon.png'))
            ->font('Inter')
            ->defaultThemeMode(ThemeMode::Light)
            ->discoverResources(in: app_path('Filament/Partner/Resources'), for: 'App\\Filament\\Partner\\Resources')
            ->discoverPages(in: app_path('Filament/Partner/Pages'), for: 'App\\Filament\\Partner\\Pages')
            ->pages([])
            ->profile(isSimple: false)
            ->discoverWidgets(in: app_path('Filament/Partner/Widgets'), for: 'App\\Filament\\Partner\\Widgets')
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
                'can:partner',
            ])
            ->renderHook(
                // This line tells us where to render it
                PanelsRenderHook::FOOTER,
                // This is the view that will be rendered
                fn () => view('components.partner_footer'),
            );
    }
}
