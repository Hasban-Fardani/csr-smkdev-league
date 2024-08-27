<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function __invoke()
    {
        return view('livewire.sector');
    }
}
