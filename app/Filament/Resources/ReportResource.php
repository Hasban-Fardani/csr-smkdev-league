<?php

namespace App\Filament\Resources;

use App\Filament\Exports\ReportExporter;
use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportResource extends Resource
{
    protected static ?string $modelLabel = 'Laporan';

    protected static ?string $pluralModelLabel = 'Laporan';

    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('JUDUL')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('funds')
                    ->required()
                    ->numeric()
                    ->label('BIAYA'),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\DatePicker::make('realization_date')
                    ->label('TANGGAL REALISASI'),
                Forms\Components\TextInput::make('project.name')
                    ->required(),
                Forms\Components\TextInput::make('project.description'),
                Forms\Components\TextInput::make('partner.company_name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->label('JUDUL'),
                Tables\Columns\TextColumn::make('project.subdistrict.name')
                    ->label('LOKASI'),
                Tables\Columns\TextColumn::make('funds')
                    ->label('REALISASI')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('realization_date')
                    ->label('TGL REALISASI')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('LAPORAN DIKIRIM'),

                Tables\Columns\TextColumn::make('status')
                    ->label('STATUS')
                    ->badge()
                    ->color(function ($state) {
                        if ($state === 'diterima') {
                            return Color::Green;
                        } elseif ($state === 'revisi') {
                            return Color::Red;
                        } else {
                            return Color::Gray;
                        }
                    }),
            ])
            ->filters([
                SelectFilter::make('tahun')
                    ->options([
                        '2024',
                        '2023'
                    ]),
                SelectFilter::make('Kuartal')
                    ->options([
                        'Kuartal 1 (Januari, Februari, Maret)',
                        'Kuartal 2 (April, Mei, Juni)',
                        'Kuartal 3 (July, Agustus, September)',
                        'Kuartal 4 (Oktober, November, Desember)',
                    ])
            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                Tables\Actions\ExportAction::make()
                    ->exporter(ReportExporter::class)
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'view' => Pages\ViewReport::route('/{record}'),
        ];
    }
}
