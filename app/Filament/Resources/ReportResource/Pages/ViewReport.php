<?php

namespace App\Filament\Resources\ReportResource\Pages;

use App\Filament\Resources\ReportResource;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;

class ViewReport extends ViewRecord
{
    protected static ?string $title = 'Lihat Laporan';
    protected static string $resource = ReportResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make()->schema([
                TextEntry::make('title')
                    ->columnSpanFull(),
            
                // =======
                Section::make()->schema([
                    TextEntry::make('funds')
                        ->label('Realisasi')        
                ])->columnSpan(1),
                Section::make()->schema([
                    TextEntry::make('project.title')
                        ->label('Nama Proyek'),
                ])->columnSpan(1),
                Section::make()->schema([
                    TextEntry::make('project.subdistrict.name')
                        ->label('Kecamatan'),
                ])->columnSpan(1),
                // ======

                TextEntry::make('description')
                    ->label('Rincian Laporan')
            ])->columns(3),

            Section::make()->schema([
                Actions::make([
                    Action::make('Tolak')
                        ->action('tolak')
                        ->color('danger'),
                    Action::make('Revisi')
                        ->action('revisi')
                        ->color('warning'),
                    Action::make('Terima')
                        ->action('terima')
                        ->color(Color::Blue),
                ])->alignCenter(),
            ])->columns(1),
        ]);

        function tolak()
        {
            Notification::fromArray([
                'title' => 'Laporan Ditolak',
                'description' => 'Laporan ini ditolak',
            ]);
        }
    }
}
