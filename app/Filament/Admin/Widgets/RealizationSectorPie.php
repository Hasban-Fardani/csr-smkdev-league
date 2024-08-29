<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Sector;
use App\Models\Report;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RealizationSectorPie extends ChartWidget
{
    protected static ?string $heading = 'Persentase total realisasi berdasarkan sektor CSR';

    protected static string $color = 'success';

    protected function getData(): array
    {
        $sectorData = Sector::leftJoin('projects', 'sectors.id', '=', 'projects.sector_id')
            ->leftJoin('reports', 'projects.id', '=', 'reports.project_id')
            ->select('sectors.name', DB::raw('COALESCE(SUM(reports.funds), 0) as total_funds'))
            ->where('reports.status', 'diterima')
            ->groupBy('sectors.id', 'sectors.name')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Dana Realisasi',
                    'data' => $sectorData->pluck('total_funds')->map(function($value) {
                        return (int)$value;
                    }),
                ],
            ],
            'labels' => $sectorData->pluck('name'),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
