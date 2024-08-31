<?php

namespace App\Filament\Admin\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;

class ViewProfile extends Page
{
    protected static string $view = 'filament.admin.pages.view-profile';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $title = 'Profil';
    protected static ?string $slug = 'profile';

    public function getActions(): array
    {
        return [
            $this->editProfileAction(),
        ];
    }

    protected function editProfileAction(): Action
    {
        return Action::make('edit')
            ->label('Ubah Profil')
            ->url(fn () => EditProfile::getUrl())
            ->color('primary')
            ->icon('heroicon-o-pencil')
            ->button();
    }
}