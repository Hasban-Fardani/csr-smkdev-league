<?php

namespace App\Filament\Admin\Resources\ReportResource\Pages;

use App\Filament\Admin\Resources\ReportResource;
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
                TextEntry::make('partner.company_name')
                    ->label(''),

                TextEntry::make('realization_date')
                    ->label(''),

                ImageEntry::make('image')
                    ->label('')
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
                    Action::make('Revisi')
                        ->label('Revisi')
                        ->color(Color::Blue)
                        ->icon('heroicon-o-check-circle')
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
                            Log::info('send notif to ' . $receiver->email . ' for ' . $this->record->title . ' with status ' . $this->record->status . ' and reason: ' . $data['alasan_revisi']);
                        })
                        ->visible(fn() => !$this->record->is_published),
                ])
                ->footerActionsAlignment(Alignment::Center),
        ]);
    }
}
