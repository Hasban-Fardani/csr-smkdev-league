<?php

namespace App\Filament\Admin\Resources\PartnerResource\Pages;

use App\Filament\Admin\Resources\PartnerResource;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\StaticAction;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\FontWeight;
use Illuminate\Support\Facades\Log;

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
                ->label('Ubah Profil')
                ->icon('heroicon-o-pencil'),

            Action::make('nonactive')
                ->label('Non-aktifkan Mitra')
                ->icon('heroicon-o-power')
                ->requiresConfirmation()
                ->modalHeading('Non-aktifkan Mitra')
                ->modalDescription('Apakah anda yakin ingin menonaktifkan mitra ini?')
                ->form([
                    Textarea::make('alasan')
                        ->label('Alasan Dinonaktifkan')
                        ->required()
                        ->placeholder('Masukkan alasan mengapa Mitra ini dinonaktifkan')
                ])
                ->modalSubmitActionLabel('Kirim')
                ->modalCancelActionLabel('Batal')
                ->modalSubmitAction(fn(StaticAction $action) => $action->color(Color::Red))
                ->color(Color::Red)
                ->outlined()
                ->action(function (array $data) {
                    $this->record->update([
                        'is_active' => false
                    ]);

                    $receiver = User::where('email', $this->record->email)->first();
                    Notification::make()
                        ->title('Berhasil Menonaktifkan Mitra')
                        ->success()
                        ->send();
                    $receiver->notify(
                        Notification::make('Akun anda telah dinonaktifkan')
                            ->title('Akun anda telah dinonaktifkan')
                            ->body("Alasan: " . $data['alasan'])
                            ->danger()
                            ->toDatabase()
                    );
                    Log::info('send notif to ' . $receiver->email . ' for ' . $this->record->title . ' with status ' . $this->record->status . ' and reason: ' . $data['alasan']);
                })
                ->hidden(function () {
                    return !$this->record->is_active;
                }),


            Action::make('active')
                ->label('Aktifkan Mitra')
                ->icon('heroicon-o-power')
                ->outlined()
                ->color(Color::Green)
                ->requiresConfirmation()
                ->action(function (array $data) {
                    $this->record->update([
                        'is_active' => true
                    ]);

                    $receiver = User::where('email', $this->record->email)->first();
                    Notification::make()
                        ->title('Berhasil Mengaktifkan Mitra')
                        ->success()
                        ->send();

                    $receiver->notify(
                        Notification::make('Akun anda telah diaktifkan')
                            ->title('Akun anda telah diaktifkan')
                            ->success()
                            ->toDatabase()
                    );
                })
                ->hidden(function () {
                    return $this->record->is_active;
                })
        ];
    }
}
