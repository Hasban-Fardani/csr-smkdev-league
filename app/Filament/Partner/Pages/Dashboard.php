<?php

namespace App\Filament\Partner\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Page;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.partner.pages.dashboard';

    protected static ?string $title = 'Dashboard';

    protected static bool $shouldRegisterNavigation = false;
}
