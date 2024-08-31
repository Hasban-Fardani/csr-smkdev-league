<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Report;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Partner::where('is_active', true)->orderBy('created_at', 'DESC')->get();

        return view('livewire.mitra', [
            'mitras' => $mitras
        ]);
    }

    public function show($id)
    {
        $mitra = Partner::where('is_active', true)->where('id', $id)->first();
        $reports = Report::where('partner_id', $id)->get();

        // cencored the phone number
        $phone = preg_replace('/(\d{4})(\d{4})(\d{4})/', '$1 #### ####', $mitra->phone);

        return view('livewire.detail-mitra', [
            'mitra' => $mitra,
            'phone' => $phone,
            'reports' => $reports
        ]);
    }
}
