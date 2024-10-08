<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $activities = Activity::where('is_draft', false)->orderBy('created_at', 'DESC')->take(4)->get();
        $reports = Report::orderBy('created_at', 'DESC')->take(4)->get();

        // dinamis data
        $formatedFunds = 0;

        $countedProject = Project::where('is_published', true)->count();
        $countedProjectRealized = Report::where('status', 'diterima')->count();
        $countedMitra = Partner::where('is_active', true)->count();
        $countedFundsCSR = Report::where('status', 'diterima')->sum('funds');

        // formated funds CSR
        if ($countedFundsCSR >= 1_000_000_000) {
            $formatedFunds = round($countedFundsCSR / 1_000_000_000, 1); // Convert to millions
        }

        return view('livewire.home', [
            'activities' => $activities,
            'reports' => $reports,
            'countedProject' => $countedProject,
            'countedProjectRealized' => $countedProjectRealized,
            'countedMitra' => $countedMitra,
            'formatedFunds' => $formatedFunds
        ]);
    }
}
