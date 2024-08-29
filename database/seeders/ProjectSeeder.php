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
        $projects = [
            [
                'images' => json_encode(['storage/images/bg-kegiatan-1.png', 'storage/images/bg-kegiatan-2.png', 'storage/images/bg-kegiatan-3.png', 'storage/images/bg-kegiatan-4.png']),
                'title' => 'Pembangunan Jalan Raya Penghubung Desa',
                'description' => 'Proyek pembangunan jalan raya baru sepanjang 10 km untuk menghubungkan desa-desa terpencil di kecamatan Arjawinangun.',
                'start_date' => now()->subMonths(2),
                'end_date' => now()->addMonths(4),
                'published_date' => now()->subDays(7),
                'is_published' => 1,
                'sector_program_id' => 1, // Pembangunan Jalan Raya
                'subdistrict_id' => 1,
            ],
            [
                'images' => json_encode(['storage/images/bg-kegiatan-2.png', 'storage/images/bg-kegiatan-3.png', 'storage/images/bg-kegiatan-4.png']),
                'title' => 'Pembangunan Laboratorium IPA SMA Negeri 1 Astanajapura',
                'description' => 'Proyek pembangunan laboratorium IPA lengkap untuk meningkatkan kualitas pendidikan di SMA Negeri 1 Astanajapura.',
                'start_date' => now()->subMonths(1),
                'end_date' => now()->addMonths(3),
                'published_date' => now()->subDays(14),
                'is_published' => 1,
                'sector_program_id' => 5, // Pembangunan Laboratorium
                'subdistrict_id' => 2,
            ],
            [
                'images' => json_encode(['storage/images/bg-kegiatan-3.png', 'storage/images/bg-kegiatan-4.png', 'storage/images/bg-kegiatan-2.png', 'storage/images/bg-kegiatan-1.png']),
                'title' => 'Renovasi dan Peningkatan Fasilitas Puskesmas Babakan',
                'description' => 'Proyek renovasi dan peningkatan fasilitas Puskesmas Babakan untuk meningkatkan layanan kesehatan masyarakat.',
                'start_date' => now()->subMonths(3),
                'end_date' => now()->addMonths(2),
                'published_date' => now()->subDays(21),
                'is_published' => 1,
                'sector_program_id' => 7, // Perbaikan Rumah Sakit
                'subdistrict_id' => 3,
            ],
            [
                'images' => json_encode(['storage/images/bg-kegiatan-4.png', 'storage/images/bg-kegiatan-2.png', 'storage/images/bg-kegiatan-1.png']),
                'title' => 'Pembangunan Taman Kota Hijau di Beber',
                'description' => 'Proyek pembangunan taman kota hijau seluas 5 hektar di kecamatan Beber untuk meningkatkan ruang terbuka hijau dan kualitas lingkungan.',
                'start_date' => now()->subMonths(4),
                'end_date' => now()->addMonths(5),
                'published_date' => now()->subDays(30),
                'is_published' => 1,
                'sector_program_id' => 10, // Program Penghijauan
                'subdistrict_id' => 4,
            ],
            [
                'images' => json_encode(['storage/images/bg-kegiatan-2.png', 'storage/images/bg-kegiatan-1.png', 'storage/images/bg-kegiatan-4.png', 'storage/images/bg-kegiatan-2.png']),
                'title' => 'Revitalisasi Pasar Tradisional Ciledug',
                'description' => 'Proyek revitalisasi pasar tradisional di Ciledug untuk meningkatkan fasilitas dan mendukung ekonomi lokal.',
                'start_date' => now()->subMonths(5),
                'end_date' => now()->addMonths(1),
                'published_date' => now()->subDays(45),
                'is_published' => 1,
                'sector_program_id' => 15, // Pembangunan Pasar
                'subdistrict_id' => 5,
            ],
        ];

        Project::insert($projects);
    }
}
