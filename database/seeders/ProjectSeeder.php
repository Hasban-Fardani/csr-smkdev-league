<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Gaji yang belum dibayarkan bulan kemaren',
            'description' => 'Lorem ipsum dolor sit amet',
            'start_date' => now(),
            'end_date' => now()->subDays(1),
            'sector_program_id' => 1,
            'subdistrict_id' => 1,
        ]);
    }
}
