<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PartnerResource\Pages;
use App\Filament\Admin\Resources\PartnerResource\RelationManagers;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $modelLabel = 'Mitra';

    protected static ?string $pluralModelLabel = 'Mitra';

    public static function getNavigationLabel(): string
    {
        return __('Mitra');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\FileUpload::make('logo')
                        ->label('FOTO')
                        ->required()
                        ->image()
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Mitra')
                        ->required(),
                    Forms\Components\TextInput::make('company_name')
                        ->label('Nama  PT')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('phone')
                        ->label('No Telepon')
                        ->tel()
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('address')
                        ->label('Alamat')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->required()
                        ->maxLength(255),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('logo')
                    ->label('FOTO'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('NAMA'),
                Tables\Columns\TextColumn::make('company_name')
                    ->label('NAMA PT')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('DESKRIPSI')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('TGL TERDAFTAR')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('is_active')
                    ->label('STATUS')
                    ->badge()
                    ->color(function ($state) {
                        return $state ? 'success' : 'danger';
                    })
                    ->formatStateUsing(function ($state) {
                        return $state ? 'Aktif' : 'Non-Aktif';
                    })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'view' => Pages\ViewPartner::route('/{record}'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}
