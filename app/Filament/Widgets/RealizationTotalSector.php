<?php

namespace App\Filament\Widgets;

use App\Models\Sector;
use Filament\Widgets\ChartWidget;

class RealizationTotalSector extends ChartWidget
{
    protected static ?string $heading = 'Total realisasi sektor CSR';

    protected function getData(): array
    {
        $sectors = Sector::all();
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [20, 10, 24, 12, 9],
                ],
            ],
            'labels' => $sectors->pluck('name'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
