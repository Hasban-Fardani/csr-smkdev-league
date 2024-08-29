<?php

namespace App\Filament\Admin\Resources\SectorResource\Pages;

use App\Filament\Admin\Resources\SectorResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;

class ViewSector extends ViewRecord
{
    protected static string $resource = SectorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('edit')
                ->url(route('filament.admin.resources.sectors.edit', ['record' => $this->record])),
        ];
    }
}
