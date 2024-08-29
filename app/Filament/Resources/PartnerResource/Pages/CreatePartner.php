<?php

namespace App\Filament\Resources\PartnerResource\Pages;

use App\Filament\Resources\PartnerResource;
use App\Models\Partner;
use App\Models\User;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Colors\Color;

class CreatePartner extends CreateRecord
{
    protected static string $resource = PartnerResource::class;

    protected static ?string $title = 'Buat Mitra Baru';

    // redirect to index page after creating record
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('kembali')
                ->label('kembali')
                ->url($this->getResource()::getUrl('index'))
                ->color(Color::Gray),
            Action::make('create')
                ->label('Buat')
                ->action('createPartner'),
        ];
    }


    public function createPartner()
    {
        $userData = [
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => fake()->password,
        ];

        $user = User::create($userData);

        $partnerData = $this->data;
        unset($partnerData['name']);
        Partner::create($partnerData);

        return redirect($this->getResource()::getUrl('index'));
    }
}
