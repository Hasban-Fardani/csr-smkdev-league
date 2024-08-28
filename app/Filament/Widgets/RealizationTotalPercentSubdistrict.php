<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class RealizationTotalPercentSubdistrict extends ChartWidget
{
    protected static ?string $heading = 'Persentase total realisasi berdasarkan Kecamatan';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
