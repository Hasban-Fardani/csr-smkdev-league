<?php

namespace App\Filament\Admin\Resources\ProjectResource\Pages;

use App\Filament\Admin\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this::$resource::getUrl('index');
    }
}
