<?php

namespace App\Filament\Admin\Resources\ActivityResource\Pages;

use App\Filament\Admin\Resources\ActivityResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Colors\Color;

class EditActivity extends EditRecord
{
    protected static string $resource = ActivityResource::class;

    protected static $isDraft = false;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl() : string
    {
        return $this::$resource::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('saveDraft')
                ->label('Simpan Sebagai Draf')
                ->action('saveDraft')
                ->color(Color::Gray),
            
            Action::make('savePublish')
                ->label('Terbitkan Kegiatan')
                ->action('savePublish'),
        ];
    }

    public function mutateFormDataBeforeSave(array $data): array
    {
        $data['is_draft'] = self::$isDraft;
        return $data;
    }

    public function savePublish(): void
    {
        self::$isDraft = false;
        $this->save();
    }

    public function saveDraft(): void
    {
        self::$isDraft = true;
        $this->save();
    }
}
