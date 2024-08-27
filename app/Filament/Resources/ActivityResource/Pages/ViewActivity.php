<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Filament\Resources\ActivityResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\FontWeight;

class ViewActivity extends ViewRecord
{
    protected static ?string $title = 'Detail Kegiatan';
    protected static string $resource = ActivityResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make()->schema([
                ImageEntry::make('image')
                    ->label('')
                    ->alignCenter(),
                TextEntry::make('name')
                    ->label('')
                    ->size('lg')
                    ->weight(FontWeight::Bold),
                TextEntry::make('created_at')
                    ->date()
                    ->label(''),
            ]),
            Section::make()->schema([
                TextEntry::make('description')
                    ->label('')
                    ->html()
            ])
        ])->columns(1);
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('edit')
                ->url(route('filament.admin.resources.activities.edit', ['record' => $this->record])),
        ];
    }
}
