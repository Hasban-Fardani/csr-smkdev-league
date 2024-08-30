<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke()
    {
        $reports = Report::orderBy('created_at', 'DESC')->take(4)->get();

        return view('livewire.about', [
            'reports' => $reports
        ]);
    }
}
