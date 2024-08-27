<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Closure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static $selectedSector = null;

    public static function getNavigationLabel(): string
    {
        return 'Proyek';
    }

    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
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
            ])
            ->columns(6);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sectorProgram.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subdistrict.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
        ];
    }
}
