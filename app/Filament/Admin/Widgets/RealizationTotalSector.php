<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Sector;
use App\Models\Report;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RealizationTotalSector extends ChartWidget
{
    protected static ?string $heading = 'Total realisasi sektor CSR';

    protected function getData(): array
    {
        $sectorData = Sector::leftJoin('projects', 'sectors.id', '=', 'projects.sector_id')
            ->leftJoin('reports', 'projects.id', '=', 'reports.project_id')
            ->select('sectors.name', DB::raw('COALESCE(SUM(reports.funds), 0) as total_funds'))
            ->where('reports.status', 'diterima')
            ->groupBy('sectors.id', 'sectors.name')
            ->orderByDesc('total_funds')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Dana Realisasi',
                    'data' => $sectorData->pluck('total_funds'),
                    'backgroundColor' => [
                        '#36A2EB', '#4BC0C0', '#FFCE56', '#FF6384', '#9966FF', '#FF9F40', '#FF6384'
                    ],
                    'borderColor' => 'rgba(0,0,0,0)',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $sectorData->pluck('name'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y',
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
            'scales' => [
                'x' => [
                    'display' => true,
                    'grid' => [
                        'display' => false,
                    ],
                ],
                'y' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
            'maintainAspectRatio' => false,
            'responsive' => true,
        ];
    }
}
