<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function __invoke()
    {
        $sectors = Sector::all();

        return view('livewire.sector', [
            'sectors' => $sectors,
        ]);
    }
}
