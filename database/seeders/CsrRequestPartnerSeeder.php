<?php

namespace Database\Seeders;

use App\Models\CsrRequestPartner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CsrRequestPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CsrRequestPartner::create([
            'csr_request_id' => 1,
            'partner_id' => 1,
        ]);
    }
}
