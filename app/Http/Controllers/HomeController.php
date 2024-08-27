<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Report;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $activities = Activity::where('is_draft', false)->inRandomOrder()->paginate(4);

        $reports = Report::all();

        return view('livewire.home', [
            'activities' => $activities,
            'reports' => $reports
        ]);
    }
}
