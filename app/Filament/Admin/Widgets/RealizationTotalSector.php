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
            ->select('sectors.name', DB::raw('SUM(reports.funds) as total_funds'))
            ->where('reports.status', 'diterima')
            ->groupBy('sectors.id', 'sectors.name')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Total Dana Realisasi',
                    'data' => $sectorData->pluck('total_funds'),
                ],
            ],
            'labels' => $sectorData->pluck('name'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
