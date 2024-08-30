<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ActivityResource\Pages;
use App\Filament\Admin\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $modelLabel = 'kegiatan';

    protected static ?string $pluralModelLabel = 'kegiatan';

    /**
     * Returns the label for the navigation menu
     *
     * @return string
     */
    public static function getNavigationLabel(): string
    {
        return __('Kegiatan');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    Forms\Components\FileUpload::make('image')
                        ->label('BANNER')
                        ->image()
                        ->disk('public')
                        ->directory('images')
                        ->required(),
                    Forms\Components\TextInput::make('name')
                        ->label('JUDUL')
                        ->required()
                        ->maxLength(255)
                        ->default('Judul Artikel'),
                    Forms\Components\TagsInput::make('tags')
                        ->label('TAGS')
                        ->color(Color::Blue),
                    Forms\Components\RichEditor::make('description')
                        ->label('DESKRIPSI')
                        ->required(),
                    
                ])
                
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('FOTO')
                    ->extraAttributes([
                        'class' => 'w-24 h-24',
                    ])
                    ->disk('public')
                    ->defaultImageUrl('https://picsum.photos/300/300'),
                Tables\Columns\TextColumn::make('name')
                    ->label('JUDUL')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('DESKRIPSI')
                    ->limit(50)
                    ->lineClamp(4)
                    ->html()
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_data')
                    ->label('TGL DITERBITKAN')
                    ->dateTime()
                    ->placeholder('Belum Terbit')
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_draft')
                    ->label('STATUS')
                    ->color(fn ($state) => $state ? Color::Red : Color::Blue)
                    ->formatStateUsing(function (Activity $record): string {
                        return $record->is_draft ? 'Draf' : 'Terbit';
                    })
                    ->badge()
                    ->sortable(),
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'view' => Pages\ViewActivity::route('/{record}'),
        ];
    }
}
