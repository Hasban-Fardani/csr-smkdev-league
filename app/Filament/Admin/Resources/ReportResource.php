<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ReportResource\Pages;
use App\Filament\Admin\Resources\ReportResource\RelationManagers;
use App\Filament\Exports\ReportExporter;
use App\Models\Report;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $title = 'Laporan';

    protected static ?string $pluralModelLabel = 'Laporan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
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
            ->modifyQueryUsing(function (Builder $query) {
                $query->orderBy('id', 'desc')
                    ->with(['project', 'project.subdistrict'])
                    ->where('is_submitted', true);
            })
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('JUDUL')
                    ->searchable(),
                Tables\Columns\TextColumn::make('project.subdistrict.name')
                    ->label('LOKASI')
                    ->sortable(),
                Tables\Columns\TextColumn::make('funds')
                    ->label('REALISASI')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('realization_date')
                    ->label('TGL REALISASI')
                    ->date(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('TGL DIBUAT')
                    ->dateTime('d F Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(function ($state) {
                        return ucfirst($state);
                    })
                    ->color(function ($state) {
                        $colors = [
                            'revisi' => 'warning',
                            'diterima' => 'success',
                            'ditolak' => 'danger',
                            'draf' => 'gray',
                        ];
                        return $colors[$state];
                    })
                    ->badge()
            ])
            ->filters([
                SelectFilter::make('tahun')
                    ->options(function () {
                        return Report::selectRaw('YEAR(realization_date) as year')
                        ->distinct()
                        ->orderBy('year', 'desc')
                        ->pluck('year', 'year')
                        ->toArray();
                    })
                    ->modifyQueryUsing(function (Builder $query, $state) {
                        $query->when($state['value'] !== '0' && $state['value'] !== null, function (Builder $query) use ($state) {
                            $query->whereYear('realization_date', $state);
                        });
                    }),
                SelectFilter::make('Kuartal')
                    ->options([
                        'Kuartal 1 (Januari, Februari, Maret)',
                        'Kuartal 2 (April, Mei, Juni)',
                        'Kuartal 3 (Juli, Agustus, September)',
                        'Kuartal 4 (Oktober, November, Desember)',
                    ])
                    ->modifyQueryUsing(function (Builder $query, $state) {
                        $query->when($state['value'] !== '0' && $state['value'] !== null, function (Builder $query) use ($state) {
                            $query->when($state === 'Kuartal 1 (Januari, Februari, Maret)', function (Builder $query) {
                                $query->whereMonth('realization_date', '>=', 1)->whereMonth('realization_date', '<=', 3);
                            })->when($state === 'Kuartal 2 (April, Mei, Juni)', function (Builder $query) {
                                $query->whereMonth('realization_date', '>=', 4)->whereMonth('realization_date', '<=', 6);
                            })->when($state === 'Kuartal 3 (Juli, Agustus, September)', function (Builder $query) {
                                $query->whereMonth('realization_date', '>=', 7)->whereMonth('realization_date', '<=', 9);
                            })->when($state === 'Kuartal 4 (Oktober, November, Desember)', function (Builder $query) {
                                $query->whereMonth('realization_date', '>=', 10)->whereMonth('realization_date', '<=', 12);
                            });
                        });
                    }),
            ])
            ->filtersLayout(FiltersLayout::AboveContent)
            ->actions([
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
