<?php

namespace Database\Seeders;

use App\Models\ReportFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReportFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportFile::create([
            'file' => Str::random(10).'.pdf',
            'report_id' => 1,
        ]);
    }
}
