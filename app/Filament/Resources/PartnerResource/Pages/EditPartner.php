<?php

namespace App\Filament\Resources\PartnerResource\Pages;

use App\Filament\Resources\PartnerResource;
use App\Models\Partner;
use App\Models\User;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Colors\Color;

class EditPartner extends EditRecord
{
    protected static string $resource = PartnerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('kembali')
                ->label('kembali')
                ->url($this->getResource()::getUrl('index'))
                ->color(Color::Gray),
            Action::make('create')
                ->label('Simpan')
                ->action('updatePartner'),
        ];
    }

    public function updatePartner()
    {
        $data = $this->data;

        // update user
        $userData = [
            'name' => $data['name'],
            'email' => $data['email'],
        ];

        $user = User::where('email', $data['email'])->first();
        $user->update($userData);
        
        // update partner
        unset($data['name']);  // remove name because it's already in user
        $partner = Partner::where('email', $data['email'])->first();
        $partner->update($data);

        $this->redirect($this->getResource()::getUrl('index'));
    }
}
