<?php

namespace App\Filament\Admin\Resources\ActivityResource\Pages;

use App\Filament\Admin\Resources\ActivityResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Colors\Color;
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CreateActivity extends CreateRecord
{
    protected static ?string $title = 'Kegiatan Baru';
    protected static string $resource = ActivityResource::class;
    public static bool $isDraft = false;

    public function getTitle(): string|Htmlable
    {
        return 'Kegiatan Baru';
    }

    protected function getRedirectUrl() : string
    {
        return $this::$resource::getUrl('index');
    }
    
    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['admin_id'] = Auth::user()->id;
        $data['is_draft'] = self::$isDraft;
        return $data;
    }
    
    public function saveDraft()
    {
        self::$isDraft = true;
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
