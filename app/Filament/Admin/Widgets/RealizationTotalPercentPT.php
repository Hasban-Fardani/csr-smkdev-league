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
                    'label' => 'Persentase Realisasi',
                    'data' => $partnerData->map(function ($item) use ($totalFunds) {
                        return $totalFunds > 0 ? round(($item->total_funds / $totalFunds) * 100, 2) : 0;
                    }),
                ],
            ],
            'labels' => $partnerData->pluck('name'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
