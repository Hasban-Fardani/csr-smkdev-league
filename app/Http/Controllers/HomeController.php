<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $activities = Activity::where('is_draft', false)->orderBy('created_at', 'DESC')->take(4)->get();

        $reports = Report::orderBy('created_at', 'DESC')->take(4)->get();

        return view('livewire.home', [
            'activities' => $activities,
            'reports' => $reports
        ]);
    }
}
