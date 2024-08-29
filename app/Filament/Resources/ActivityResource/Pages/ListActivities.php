<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Filament\Resources\ActivityResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListActivities extends ListRecords
{
    protected static string $resource = ActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'semua' => Tab::make('Semua'),
            'terbit' => Tab::make('Terbit')
                ->modifyQueryUsing(fn (Builder $query): Builder => $query->where('is_draft', false)),
            'draf' => Tab::make('Draf')
                ->modifyQueryUsing(fn (Builder $query): Builder => $query->where('is_draft', true)),
        ];
    }
}
