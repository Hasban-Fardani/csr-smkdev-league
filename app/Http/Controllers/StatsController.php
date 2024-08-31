<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function __invoke()
    {
        $formatedFunds = 0;

        $countedProject = Project::where('is_published', true)->count();
        $countedProjectRealized = Report::where('status', 'diterima')->count();
        $countedMitra = Partner::where('is_active', true)->count();
        $countedFundsCSR = Report::where('status', 'diterima')->sum('funds');

        // formated funds CSR
        if ($countedFundsCSR >= 1_000_000_000) {
            $formatedFunds = round($countedFundsCSR / 1_000_000_000, 1); // Convert to millions
        }

        return view('livewire.stats', [
            'countedProject' => $countedProject,
            'countedProjectRealized' => $countedProjectRealized,
            'countedMitra' => $countedMitra,
            'formatedFunds' => $formatedFunds
        ]);
    }
}
