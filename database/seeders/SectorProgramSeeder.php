<?php

namespace Database\Seeders;

use App\Models\SectorProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectorProgram::create([
            'name' => 'Jaminan sosial',
            'description' => 'Lorem ipsum dolor sit amet',
            'sector_id' => 1,
        ]);
    }
}
