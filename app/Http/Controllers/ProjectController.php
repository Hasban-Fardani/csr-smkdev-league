<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show($id)
    {
        $projects = Project::withAggregate('subdistrict', 'name')->withAggregate('sectorProgram', 'name')->findOrFail($id);
        $images = ProjectImage::where('project_id', $id)->get();

        return view('livewire.project', [
            'projects' => $projects,
            'images' => $images
        ]);
    }
}
