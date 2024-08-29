<?php

namespace App\Filament\Admin\Resources\ReportResource\Pages;

use App\Filament\Admin\Resources\ReportResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListReports extends ListRecords
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'semua' => Tab::make('Semua'),
            'diterima' => Tab::make('Diterima')
                ->modifyQueryUsing(fn (Builder $query): Builder => $query->where('status', 'diterima')),
            'revisi' => Tab::make('Revisi')
                ->modifyQueryUsing(fn (Builder $query): Builder => $query->where('status', 'revisi')),
            'ditolak' => Tab::make('Ditolak')
                ->modifyQueryUsing(fn (Builder $query): Builder => $query->where('status', 'ditolak')),
        ];
    }

    
}
