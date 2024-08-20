<?php

namespace Database\Seeders;

use App\Models\Subdistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subdistrict::create([
            'name' => 'Cijerah',
        ]);
    }
}
