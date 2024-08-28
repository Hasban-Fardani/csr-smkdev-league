<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::where('is_draft', false);

        return view('livewire.activity', [
            'activities' => $activities->paginate(8)
        ]);
    }

    public function show($id)
    {
        $activity = Activity::find($id);
        $activities = Activity::where('is_draft', false)->orderBy('created_at', 'DESC')->take(4)->get();
        
        return view('livewire.detail-activity', [
            'activity' => $activity,
            'activities' => $activities
        ]);
    }
}
