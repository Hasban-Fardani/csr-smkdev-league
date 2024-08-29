<?php

namespace App\Filament\Partner\Widgets;

use App\Models\Report;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ReportTableWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Report::query()
            )
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('JUDUL')
                    ->searchable(),
                Tables\Columns\TextColumn::make('project.subdistrict.name')
                    ->label('LOKASI')
                    ->sortable(),
                Tables\Columns\TextColumn::make('funds')
                    ->label('REALISASI')
                    ->money('Rp. '),
                Tables\Columns\TextColumn::make('realization_date')
                    ->label('TGL REALISASI'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('LAPORAN DIKIRIM'),
                Tables\Columns\TextColumn::make('status')
                    ->label('STATUS')
                    ->formatStateUsing(function ($state) {
                        return ucfirst($state);
                    })
                    ->color(function ($state) {
                        // 'draf','ditolak','revisi','diterima'
                        match ($state) {
                            'draf' => 'warning',
                            'ditolak' => 'danger',
                            'revisi' => 'warning',
                            'diterima' => 'success',
                            default => 'secondary',
                        };
                    })
                    ->sortable(),
            ]);
    }
}
