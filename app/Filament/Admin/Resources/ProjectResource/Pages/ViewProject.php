<?php

namespace App\Filament\Admin\Resources\ProjectResource\Pages;

use App\Filament\Admin\Resources\ProjectResource;
use Filament\Actions\StaticAction;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\FontWeight;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action as NotificationAction;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Illuminate\Contracts\Support\Htmlable;

class ViewProject extends ViewRecord
{
    protected static string $resource = ProjectResource::class;

    public function getTitle(): string|Htmlable
    {
        return 'Detail Project';
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make($this->record->title)->schema([
                    ImageEntry::make('image')
                        ->label('')
                        ->columnSpanFull(),
                    TextEntry::make('start_date'),
                    TextEntry::make('subdistrict.name')
                        ->label('Kecamatan'),
                    TextEntry::make('description')
                        ->label('Rincian Laporan')
                        ->columnSpanFull()
                ])
                ->columns(2)
                ->footerActions([
                    Action::make('publish')
                        ->label('Publish')
                        ->color(Color::Blue)
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        ->modalHeading('Publish Project')
                        ->modalDescription('Apakah Anda yakin ingin mempublikasikan project ini?')
                        ->modalSubmitActionLabel('Ya, Publikasikan')
                        ->modalCancelActionLabel('Batal')
                        ->modalSubmitAction(fn (StaticAction $action) => $action->color(Color::Blue))
                        ->action(function () {
                            $this->record->update(['is_published' => true]);
                            Notification::make()
                                ->title('Project berhasil dipublikasikan')
                                ->success()
                                ->send();
                        })
                        ->visible(fn () => !$this->record->is_published),
                ])
                ->footerActionsAlignment(Alignment::Center)
            ]);
    }
}
