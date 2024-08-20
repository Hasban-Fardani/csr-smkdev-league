<?php

namespace Database\Seeders;

use App\Models\CsrRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CsrRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CsrRequest::create([
            'name' => 'Opet',
            'date_of_birth' => '2007-07-26',
            'address' => 'BBC',
            'phone' => '089508292174',
            'on_behalf_of' => 'perorangan',
            'program' => 'Gaji yang belum dibayarkan bulan kemaren.',
        ]);
    }
}
