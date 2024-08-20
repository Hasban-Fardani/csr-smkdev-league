<?php

namespace Database\Seeders;

use App\Models\ProjectImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectImage::create([
            'image' => Str::random(10).'.png',
            'project_id' => 1,
        ]);
    }
}
