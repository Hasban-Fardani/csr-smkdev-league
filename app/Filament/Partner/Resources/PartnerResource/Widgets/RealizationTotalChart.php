<?php

namespace App\Filament\Partner\Resources\PartnerResource\Widgets;

use Filament\Widgets\ChartWidget;

class RealizationTotalChart extends ChartWidget
{
    protected function getData(): array
    {
        return [
            'datasets' => [[
                'data' => [1, 10, 5, 2, 21, 32],
                'backgroundColor' => ['rgb(0,0,0)', 'rgb(255,0,255)'],
            ]],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected static ?array $options = [
        'scales' => [
            'x' => [
                'display' => false,
            ],
            'y' => [
                'display' => false,
            ],
        ],
    ];
}
