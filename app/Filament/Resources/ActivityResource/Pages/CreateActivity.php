<?php

namespace App\Filament\Resources\ActivityResource\Pages;

use App\Filament\Resources\ActivityResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Colors\Color;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CreateActivity extends CreateRecord
{
    protected static string $resource = ActivityResource::class;
    public static bool $is_draft = false;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['admin_id'] = Auth::user()->id;
        $data['is_draft'] = self::$is_draft;
        return $data;
    }

    protected function getRedirectUrl() : string
    {
        return $this::$resource::getUrl('index');
    }
    
    public function saveDraft()
    {
        self::$is_draft = true;
        $this->create(another: false);
    }
    
    protected function getFormActions(): array
    {
        return [
            Action::make('draf')
                ->label('Simpan Sebagai Draf')
                ->action('saveDraft')
                ->color(Color::Gray),
            Action::make('create')
                ->label('Buat'),
        ];
    }
}
