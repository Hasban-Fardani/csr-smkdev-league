<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Subdistrict;
use App\Models\Report;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RealizationTotalPercentSubdistrict extends ChartWidget
{
    protected static ?string $heading = 'Persentase total realisasi berdasarkan Kecamatan';

    protected function getData(): array
    {
        $subdistrictData = Subdistrict::leftJoin('projects', 'subdistricts.id', '=', 'projects.subdistrict_id')
            ->leftJoin('reports', 'projects.id', '=', 'reports.project_id')
            ->select('subdistricts.name', DB::raw('COALESCE(SUM(reports.funds), 0) as total_funds'))
            ->where('reports.status', 'diterima')
            ->groupBy('subdistricts.id', 'subdistricts.name')
            ->orderByDesc('total_funds')
            ->limit(10)
            ->get();

        $totalFunds = $subdistrictData->sum('total_funds');

        return [
            'datasets' => [
                [
                    'data' => $subdistrictData->map(function ($item) use ($totalFunds) {
                        return $totalFunds > 0 ? round(($item->total_funds / $totalFunds) * 100, 2) : 0;
                    }),
                    'backgroundColor' => [
                        '#36A2EB', '#4BC0C0', '#FFCE56', '#FF6384', '#9966FF', '#FF9F40', '#FF6384', '#4BC0C0', '#FFCE56', '#36A2EB'
                    ],
                    'borderColor' => 'rgba(0,0,0,0)',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $subdistrictData->pluck('name')->map(function($name, $index) use ($subdistrictData) {
                return 'Kec. ' . $name . ': Rp.' . number_format($subdistrictData[$index]->total_funds, 0, ',', '.');
            }),
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
                    'display' => false,
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
