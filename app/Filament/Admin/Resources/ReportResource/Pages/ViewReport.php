<?php

namespace App\Filament\Admin\Resources\ReportResource\Pages;

use App\Filament\Admin\Resources\ReportResource;
use Filament\Actions;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\FontWeight;

class ViewReport extends ViewRecord
{
    protected static string $resource = ReportResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make()->schema([
                TextEntry::make('title')
                    ->label('')
                    ->size('lg')
                    ->weight(FontWeight::Bold),
                TextEntry::make('funds')
                    ->label('Realisasi')
                    ->money('Rp. '),

                ImageEntry::make('image')
                    ->label(''),

                Section::make()->schema([
                    TextEntry::make('realization_date'),
                    TextEntry::make('project.title')
                        ->label('Nama Proyek'),
                    TextEntry::make('project.subdistrict.name')
                        ->label('Kecamatan'),
                ])->columns(3),

                TextEntry::make('description'),
            ]),
        ]);
    }
}
