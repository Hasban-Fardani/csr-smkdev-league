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
        $sectors = [
            [
                'banner' => 'banners/storage/avatars/avatar-1.pngtor1.jpg',
                'name' => 'Infrastruktur',
                'description' => 'Pengembangan infrastruktur untuk meningkatkan kualitas fasilitas umum.',
            ],
            [
                'banner' => 'storage/avatars/avatar-1.png',
                'name' => 'Pendidikan',
                'description' => 'Program untuk meningkatkan kualitas pendidikan di semua tingkat.',
            ],
            [
                'banner' => 'storage/avatars/avatar-1.png',
                'name' => 'Kesehatan',
                'description' => 'Peningkatan fasilitas kesehatan dan layanan medis.',
            ],
            [
                'banner' => 'storage/avatars/avatar-1.png',
                'name' => 'Lingkungan',
                'description' => 'Program untuk melindungi dan meningkatkan kualitas lingkungan.',
            ],
            [
                'banner' => 'storage/avatars/avatar-1.png',
                'name' => 'Ekonomi',
                'description' => 'Inisiatif untuk pengembangan ekonomi lokal dan pemberdayaan usaha kecil.',
            ],
        ];

        Sector::insert($sectors);
    }
}
