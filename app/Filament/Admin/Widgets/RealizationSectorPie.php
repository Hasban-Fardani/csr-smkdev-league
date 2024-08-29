<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Sector;
use Filament\Widgets\ChartWidget;

class RealizationSectorPie extends ChartWidget
{
    protected static ?string $heading = 'Persentase total realisasi berdasarkan sektor CSR';

    protected static string $color = 'success';

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
        return 'pie';
    }
}
