<?php

namespace App\Filament\Admin\Resources\PartnerResource\Pages;

use App\Filament\Admin\Resources\PartnerResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\FontWeight;

class ViewPartner extends ViewRecord
{
    protected static string $resource = PartnerResource::class;

    protected static ?string $title = 'Detail Mitra';

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make()->schema([
                Grid::make()->schema([
                    ImageEntry::make('logo')
                        ->label(''),

                    Section::make()->schema([
                        TextEntry::make('user.name')
                            ->label('')
                            ->size(TextEntrySize::Large)
                            ->weight(FontWeight::Bold),
                        TextEntry::make('company_name')
                            ->label(''),
                        TextEntry::make('email')
                            ->label('')
                            ->icon('heroicon-o-envelope'),
                        TextEntry::make('phone')
                            ->label('')
                            ->icon('heroicon-o-phone'),
                        TextEntry::make('address')
                            ->label('')
                            ->icon('heroicon-o-map-pin'),
                        TextEntry::make('description')
                            ->label(''),
                    ])->columnSpan(1),
                ])->columns(2)
            ])
        ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make('edit')
                ->label('Ubah Profil'),
            Action::make('nonactive')
                ->label('Non-aktifkan Mitra')
                ->icon('heroicon-o-power')
                ->hidden(function () {
                    return !$this->record->is_active;
                })
                ->requiresConfirmation()
                ->action('deactivatePartner'),
            Action::make('active')
                ->label('Aktifkan Mitra')
                ->icon('heroicon-o-power')
                ->hidden(function () {
                    return $this->record->is_active;
                })
                ->requiresConfirmation()
                ->action('activitePartner')
        ];
    }

    public function activitePartner()
    {
        $this->record->update([
            'is_active' => true
        ]);
    }

    public function deactivatePartner()
    {
        $this->record->update([
            'is_active' => false
        ]);
    }
}
