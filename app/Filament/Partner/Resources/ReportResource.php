<?php

namespace App\Filament\Partner\Resources;

use App\Filament\Partner\Resources\ReportResource\Pages;
use App\Filament\Partner\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $title = 'Laporan';

    protected static ?string $pluralModelLabel = 'Laporan';

    /**
     * Returns the label for the navigation menu
     *
     * @return string
     */
    public static function getNavigationLabel(): string
    {
        return __('Laporan');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('JUDUL LAPORAN')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Masukan nama laporan CSR'),
                    Forms\Components\Select::make('project_id')
                        ->label('NAMA PROYEK CSR')
                        ->required()
                        ->options([
                            Project::leftJoin('reports', function($join) {
                                $join->on('projects.id', '=', 'reports.project_id');
                            })
                            ->where('partner_id', '=', Auth::user()->id)
                            ->pluck('projects.id', 'projects.title')
                        ])
                        ->searchable(),
                    Forms\Components\DatePicker::make('realization_date')
                        ->label('TANGGAL REALISASI')
                        ->required(),
                    Forms\Components\TextInput::make('funds')
                        ->label('REALISASI')
                        ->integer()
                        ->required(),
                    Forms\Components\RichEditor::make('description')
                        ->label('DESKRIPSI')
                        ->required(),
                    Forms\Components\FileUpload::make('files')
                        ->label('GAMBAR')
                        ->image()
                        ->multiple()
                        ->disk('public')
                        ->directory('images')
                        ->required(),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('funds')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('realization_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('project_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('partner_id')
                    ->numeric()
                    ->sortable(),
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
            'create' => Pages\CreateReport::route('/create'),
            'index' => Pages\ListReports::route('/'),
            'view' => Pages\ViewReport::route('/{record}'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
