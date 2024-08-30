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
                    'label' => 'Persentase Realisasi',
                    'data' => $subdistrictData->map(function ($item) use ($totalFunds) {
                        return $totalFunds > 0 ? round(($item->total_funds / $totalFunds) * 100, 2) : 0;
                    }),
                ],
            ],
            'labels' => $subdistrictData->pluck('name'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
