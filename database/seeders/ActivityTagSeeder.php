<?php

namespace Database\Seeders;

use App\Models\ActivityTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivityTag::create([
            'activity_id' => 1,
            'tag_id' => 1,
        ]);
    }
}
