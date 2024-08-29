<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Report::create([
            'title' => 'First Project Report',
            'description' => 'Lorem ipsum dolor sit amet',
            'funds' => 10000000,
            'status' => 'draf',
            'realization_date' => now(),
            'project_id' => 1,
            'partner_id' => 1,
        ]);
    }
}
