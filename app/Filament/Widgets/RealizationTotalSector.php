<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class RealizationTotalSector extends ChartWidget
{
    protected static ?string $heading = 'Total realisasi sektor CSR';

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
