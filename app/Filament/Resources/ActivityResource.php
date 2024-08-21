<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('BANNER')
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('JUDUL')
                    ->required()
                    ->maxLength(255)
                    ->default('Judul Artikel'),
                Forms\Components\RichEditor::make('description')
                    ->label('KONTEN')
                    ->required()
                    ->columnSpanFull(),
                
                Forms\Components\TagsInput::make('tags')
                    ->label('TAGS'),
                    // ->saveRelationships(),
                Forms\Components\Toggle::make('is_draft')
                    ->label('DRAFT')
                    ->required(),
                
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('FOTO')
                    ->getStateUsing(function (Activity $record): string {
                        return $record->image;
                    })
                    ->extraAttributes([
                        'class' => 'w-24 h-24',
                    ])
                    ->defaultImageUrl('https://picsum.photos/300/300'),
                Tables\Columns\TextColumn::make('name')
                    ->label('JUDUL')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_draft')
                    ->boolean(),
                Tables\Columns\TextColumn::make('admin.name')
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
