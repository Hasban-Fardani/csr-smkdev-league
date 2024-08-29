<?php

namespace App\Filament\Admin\Resources\SectorResource\Pages;

use App\Filament\Admin\Resources\SectorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSector extends EditRecord
{
    protected static string $resource = SectorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl() : string
    {
        return $this::$resource::getUrl('index');
    }
}
