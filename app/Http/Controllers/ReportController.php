<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::paginate(8);

        return view('livewire.report', [
            'reports' => $reports
        ]);
    }

    public function show($id)
    {
        $report = Report::find($id);

        return view('livewire.detail-report', [
            'report' => $report
        ]);
    }
}
