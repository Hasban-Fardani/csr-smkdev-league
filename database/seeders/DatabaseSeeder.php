<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Partner;
use App\Models\Tag;
use App\Models\Activity;
use App\Models\ActivityTag;
use App\Models\Sector;
use App\Models\SectorProgram;
use App\Models\Subdistrict;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Report;
use App\Models\ReportFile;
use App\Models\CsrRequest;
use App\Models\CsrRequestPartner;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ActivitySeeder::class,
            SectorSeeder::class,
            SectorProgramSeeder::class,
            SubdistrictSeeder::class,
            ProjectSeeder::class,
            ProjectImageSeeder::class,
            ReportSeeder::class,
            ReportFileSeeder::class,
            CsrRequestSeeder::class,
            CsrRequestPartnerSeeder::class,
        ]);
    }
}
