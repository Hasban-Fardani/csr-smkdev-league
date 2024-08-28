<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Activity;

class PartnerActivityTable extends Component
{
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

    public function render()
    {
        return view('livewire.partner-activity-table');
    }
}
