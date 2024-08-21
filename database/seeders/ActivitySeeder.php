<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::create([
            'image' => 'images/bg-kegiatan1.png',
            'name' => 'LOREM IPSUM',
            'description' => 'Lorem ipsum dolor sit amet',
            'is_draft' => false,
            'admin_id' => 1,
            'tags' => json_encode(['lorem', 'ipsum']),
        ]);
    }
}
