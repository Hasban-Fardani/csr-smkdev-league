<?php

namespace App\Filament\Admin\Resources\ReportResource\Pages;

use App\Filament\Admin\Resources\ReportResource;
use App\Models\Report;
use App\Models\User;
use Filament\Actions;
use Filament\Actions\StaticAction;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Illuminate\Support\Facades\Log;

class ViewReport extends ViewRecord
{
    protected static string $resource = ReportResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make($this->record->title)->schema([
                TextEntry::make('status')
                    ->label('')
                    ->badge(),
                TextEntry::make('sector.name')
                    ->label('')
                    ->badge(),
                TextEntry::make('sectorProgram.name')
                    ->label('')
                    ->badge(),

                TextEntry::make('partner.company_name')
                    ->label(''),

                TextEntry::make('realization_date')
                    ->label(''),

                ImageEntry::make('files')
                    ->label('')
                    ->disk('public')
                    ->limit(4),

                Section::make()->schema([
                    TextEntry::make('funds')
                        ->label('Realisasi')
                        ->money('Rp. '),
                ])->columnSpan(1),
                Section::make()->schema([
                    TextEntry::make('project.title')
                        ->label('Nama Proyek'),
                ])->columnSpan(1),
                Section::make()->schema([
                    TextEntry::make('project.subdistrict.name')
                        ->label('Kecamatan'),
                ])->columnSpan(1),

                TextEntry::make('description')
                    ->columnSpanFull(),
            ])
            ->columns(3)
            ->footerActions([
                // Tolak action
                Action::make('Tolak')
                    ->label('Tolak')
                    ->color(Color::Red)
                    ->icon('heroicon-o-x-circle')
                    ->outlined()
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Laporan')
                    ->modalDescription('Laporan akan ditolak karena tidak sesuai')
                    ->form([
                        Textarea::make('alasan_tolak')
                            ->label('Alasan Ditolak')
                            ->required()
                            ->placeholder('Masukkan alasan mengapa laporan ditolak')
                    ])
                    ->modalSubmitActionLabel('Kirim')
                    ->modalCancelActionLabel('Batal')
                    ->modalSubmitAction(fn(StaticAction $action) => $action->color(Color::Red))
                    ->action(function (array $data) {
                        $this->record->update([
                            'status' => 'ditolak',
                        ]);

                        $partner = $this->record->partner;
                        $receiver = User::where('email', $partner->email)->first();
                        Notification::make()
                            ->title('Berhasil merubah status laporan')
                            ->success()
                            ->send();
                        $receiver->notify(
                            Notification::make('laporan ditolak')
                                ->title('Laporan ' . $this->record->title . ' ditolak')
                                ->body("Alasan: " . $data['alasan_tolak'])
                                ->actions([
                                    \Filament\Notifications\Actions\Action::make('view')
                                        ->label('Lihat Laporan')
                                        ->url(route('filament.partner.resources.reports.view', $this->record->id))
                                ])
                                ->warning()
                                ->toDatabase()
                        );
                    })
                    ->visible(fn() => !$this->record->status != 'ditolak' && $this->record->status != 'diterima'),
                
                // Revisi action
                Action::make('Revisi')
                    ->label('Revisi')
                    ->color(Color::Blue)
                    ->icon('heroicon-o-pencil')
                    ->outlined()
                    ->requiresConfirmation()
                    ->modalHeading('Revisi Laporan')
                    ->modalDescription('Laporan akan diberikan kepada mitra untuk merevisi beberapa hal yang tidak sesuai')
                    ->form([
                        Textarea::make('alasan_revisi')
                            ->label('Alasan Revisi')
                            ->required()
                            ->placeholder('Masukkan alasan mengapa laporan perlu direvisi')
                    ])
                    ->modalSubmitActionLabel('Kirim')
                    ->modalCancelActionLabel('Batal')
                    ->modalSubmitAction(fn(StaticAction $action) => $action->color(Color::Blue))
                    ->action(function (array $data) {
                        $this->record->update([
                            'status' => 'revisi',
                        ]);

                        $partner = $this->record->partner;
                        $receiver = User::where('email', $partner->email)->first();
                        Notification::make()
                            ->title('Berhasil merubah status laporan')
                            ->success()
                            ->send();
                        $receiver->notify(
                            Notification::make('Revisi laporan')
                                ->title('Revisi Laporan: ' . $this->record->title)
                                ->body("Alasan: " . $data['alasan_revisi'])
                                ->actions([
                                    \Filament\Notifications\Actions\Action::make('view')
                                        ->label('Lihat Laporan')
                                        ->url(route('filament.partner.resources.reports.view', $this->record->id))
                                ])
                                ->warning()
                                ->toDatabase()
                        );
                    })
                    ->visible(fn() => !$this->record->status != 'ditolak' && $this->record->status != 'diterima'),
                
                // Terima action
                Action::make('Terima')
                    ->label('Terima')
                    ->color(Color::Green)
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation()
                    ->modalHeading('Terima Laporan')
                    ->modalDescription('Laporan akan diterbitkan')
                    ->action(function () {
                        $this->record->update([
                            'status' => 'diterima',
                        ]);

                        $partner = $this->record->partner;
                        $receiver = User::where('email', $partner->email)->first();
                        Notification::make()
                            ->title('Berhasil merubah status laporan')
                            ->success()
                            ->send();
                        $receiver->notify(
                            Notification::make('Laporan diterima')
                                ->title('Laporan ' . $this->record->title . ' diterima')
                                ->actions([
                                    \Filament\Notifications\Actions\Action::make('view')
                                        ->label('Lihat Laporan')
                                        ->url(route('filament.partner.resources.reports.view', $this->record->id))
                                ])
                                ->success()
                                ->toDatabase()
                        );
                    })
                    ->modalSubmitActionLabel('Kirim')
                    ->modalCancelActionLabel('Batal')
                    ->modalSubmitAction(fn(StaticAction $action) => $action->color(Color::Green))
                    ->visible(fn() => !$this->record->status != 'ditolak' && $this->record->status != 'diterima'),
            ])
            ->footerActionsAlignment(Alignment::Center),
        ]);
    }
}
