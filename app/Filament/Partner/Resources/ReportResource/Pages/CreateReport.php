<?php

namespace App\Filament\Partner\Resources\ReportResource\Pages;

use App\Filament\Partner\Resources\ReportResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CreateReport extends CreateRecord
{
    protected static ?string $title = 'Buat Laporan';
    protected static string $resource = ReportResource::class;
    public static bool $isDraft = false;
    public static bool $isSubmitted = true;
    
    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['partner_id'] = Auth::user()->partner->id;
        $data['is_submitted'] = self::$isSubmitted;
        return $data;
    }
    
    public function saveDraft()
    {
        self::$isSubmitted = false;
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
                ->label('Buat')
                ->action('create')
               
        ];
    }

    protected function getRedirectUrl() : string
    {
        return $this::$resource::getUrl('index');
    }
}
