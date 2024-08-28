<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Sector;
use App\Models\SectorProgram;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
{
    public function index()
    {
        $sectors = Sector::paginate(8);
        $projects = Project::withAggregate('subdistrict', 'name')->withAggregate('sectorProgram', 'name');

        return view('livewire.sector', [
            'sectors' => $sectors,
            'projects' => $projects->paginate(8)
        ]);
    }

    public function show($id)
    {
        $sectors = Sector::findOrFail($id);
        $programs = SectorProgram::withCount('project')->where('sector_id', $id)->get();
        $projects = Project::withAggregate('subdistrict', 'name')->where('sector_program_id', $id)->get();

        // dd($projects);

        return view('livewire.detail-sector', [
            'sectors' => $sectors,
            'programs' => $programs,
            'projects' => $projects
        ]);
    }
}
