<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Sector;
use App\Models\Report;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RealizationSectorPie extends ChartWidget
{
    protected static ?string $heading = 'Persentase total realisasi berdasarkan sektor CSR';

    protected function getData(): array
    {
        $sectorData = Sector::leftJoin('sector_programs', 'sectors.id', '=', 'sector_programs.sector_id')
            ->leftJoin('reports', 'sector_programs.id', '=', 'reports.project_id') 
            ->select('sectors.name', DB::raw('COALESCE(SUM(reports.funds), 0) as total_funds'))
            ->where('reports.status', 'diterima')
            ->groupBy('sectors.id', 'sectors.name')
            ->get();
        
        $totalFunds = $sectorData->sum('total_funds');

        return [
            'datasets' => [
                [
                    'data' => $sectorData->pluck('total_funds')->map(function($value) use ($totalFunds) {
                        return $totalFunds > 0 ? round(($value / $totalFunds) * 100, 2) : 0;
                    }),
                    'backgroundColor' => [
                        '#36A2EB', '#4BC0C0', '#FFCE56', '#FF6384', '#9966FF', '#FF9F40', '#FF6384'
                    ],
                ],
            ],
            'labels' => $sectorData->pluck('name')->map(function($name, $index) use ($sectorData) {
                return $name . ': ' . number_format($sectorData[$index]->total_funds, 0, ',', '.');
            }),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'right',
                ],
            ],
            'maintainAspectRatio' => false,
            'responsive' => true,
        ];
    }
}
