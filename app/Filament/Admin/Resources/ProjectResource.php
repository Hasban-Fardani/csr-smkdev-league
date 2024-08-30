<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Filament\Admin\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    
    public static ?string $title = 'Proyek';

    protected static ?string $pluralModelLabel = 'Proyek';
    
    public static $selectedSector = null;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([

                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),
                    Forms\Components\Select::make('sector_id')
                        ->label('Sektor CSR')
                        ->options(fn () => \App\Models\Sector::all()->pluck('name', 'id'))
                        ->required()
                        ->live()
                        ->columnSpan(3),
                    Forms\Components\Select::make('sector_program_id')
                        ->options(function (Get $get) {
                            return \App\Models\SectorProgram::where('sector_id', $get('sector_id'))->get()->pluck('name', 'id');
                        })
                        ->label('Program CSR')
                        ->required()
                        ->live()
                        ->columnSpan(3),
                    Forms\Components\Select::make('subdistrict_id')
                        ->options(fn () => \App\Models\Subdistrict::all()->pluck('name', 'id'))
                        ->label('Kecamatan')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\DatePicker::make('start_date')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\DatePicker::make('end_date')
                        ->required()
                        ->columnSpan(2),
                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(6),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('JUDUL')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subdistrict.name')
                    ->label('LOKASI')
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('TGL MULAI')
                    ->dateTime('d F Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('TGL AKHIR')
                    ->dateTime('d F Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_date')
                    ->label('TGL DITERBITKAN')
                    ->dateTime('d F Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_published')
                    ->label('STATUS')
                    ->badge()
                    ->formatStateUsing(function ($state) {
                        return $state ? 'Terbit' : 'Draf';
                    })
                    ->color(function ($state) {
                        return $state ? 'success' : 'warning';
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
            'view' => Pages\ViewProject::route('/{record}'),
        ];
    }
}
