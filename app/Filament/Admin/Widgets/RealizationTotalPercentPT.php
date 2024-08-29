<?php

namespace App\Filament\Admin\Widgets;

use Filament\Widgets\ChartWidget;

class RealizationTotalPercentPT extends ChartWidget
{
    protected static ?string $heading = 'Persentase total realisasi berdasarkan PT';

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
