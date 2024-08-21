<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Filament\Resources\ActivityResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateActivity extends CreateRecord
{
    protected static string $resource = ActivityResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['admin_id'] = Auth::user()->id;
        return $data;
    }

    protected function getRedirectUrl() : string
    {
        return $this::$resource::getUrl('index');
    }
}
