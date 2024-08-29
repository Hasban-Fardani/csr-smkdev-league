<?php

namespace App\Filament\Admin\Resources\ProjectResource\Pages;

use App\Filament\Admin\Resources\ProjectResource;
use App\Livewire\StatusBadge;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Livewire;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\FontWeight;
use Illuminate\Contracts\Support\Htmlable;
use Mary\View\Components\Badge;

class ViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Detail Project';
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

            Section::make()->schema([
                TextEntry::make('title')
                    ->label('')
                    ->size(TextEntrySize::Large)
                    ->weight(FontWeight::Bold)
                    ->columnSpanFull(),
                ImageEntry::make('image')
                    ->label('')
                    ->columnSpanFull(),
                TextEntry::make('start_date'),
                TextEntry::make('subdistrict.name')
                    ->label('Kecamatan'),
                TextEntry::make('description')
                    ->label('Rincian Laporan')
                    ->columnSpanFull()
            ])->columns(2)
        ]);
    }
    
}
