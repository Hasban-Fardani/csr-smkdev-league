<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sector::create([
            'name' => 'Social',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);

        Sector::create([
            'name' => 'Lingkungan',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);

        Sector::create([
            'name' => 'Kesehatan',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);

        Sector::create([
            'name' => 'Pendidikan',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);

        Sector::create([
            'name' => 'Infrastruktur dan lingkungan',
            'description' => 'Lorem ipsum dolor sit amet',
        ]);
    }
}
