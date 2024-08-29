<?php

namespace App\Filament\Admin\Resources\SectorResource\Pages;

use App\Filament\Admin\Resources\SectorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Colors\Color;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\HtmlString;

class CreateSector extends CreateRecord
{
    protected static string $resource = SectorResource::class;

    // protected static bool $canCreateAnother = false;

    protected function getRedirectUrl() : string
    {
        return $this::$resource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(new HtmlString('<p class="text-gray-400">Simpan Sebagai Draf</p>'))
                ->icon('heroicon-o-document')
                ->color('white')
                ->outlined()
                ->action('draft'),
            Actions\CreateAction::make()
                ->label('Submit')
                ->submit('create'),
        ];
    }

    public function draft()
    {
        
    }
}
