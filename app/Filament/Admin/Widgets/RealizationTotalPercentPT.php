<?php

namespace App\Filament\Admin\Widgets;

use App\Models\User;
use App\Models\Report;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RealizationTotalPercentPT extends ChartWidget
{
    protected static ?string $heading = 'Persentase total realisasi berdasarkan PT';

    protected function getData(): array
    {
        $partnerData = User::where('role', 'partner')
            ->leftJoin('reports', 'users.id', '=', 'reports.partner_id')
            ->select('users.name', DB::raw('COALESCE(SUM(reports.funds), 0) as total_funds'))
            ->where('reports.status', 'diterima')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_funds')
            ->limit(10)
            ->get();

        $totalFunds = $partnerData->sum('total_funds');

        return [
            'datasets' => [
                [
                    'data' => $partnerData->map(function ($item) use ($totalFunds) {
                        return $totalFunds > 0 ? round(($item->total_funds / $totalFunds) * 100, 2) : 0;
                    }),
                    'backgroundColor' => [
                        '#36A2EB', '#4BC0C0', '#FFCE56', '#FF6384', '#9966FF', '#FF9F40', '#FF6384', '#4BC0C0', '#FFCE56', '#36A2EB'
                    ],
                    'borderColor' => 'rgba(0,0,0,0)',
                    'borderWidth' => 0,
                ],
            ],
            'labels' => $partnerData->pluck('name')->map(function($name, $index) use ($partnerData) {
                return $name . ': Rp.' . number_format($partnerData[$index]->total_funds, 0, ',', '.');
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
