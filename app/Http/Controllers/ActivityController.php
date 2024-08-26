<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return view('livewire.activity');
    }

    public function show()
    {
        return 'hello';
    }
}
