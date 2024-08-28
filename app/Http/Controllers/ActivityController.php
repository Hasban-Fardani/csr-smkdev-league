<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::where('is_draft', false)->paginate(8);

        return view('livewire.activity', [
            'activities' => $activities
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
