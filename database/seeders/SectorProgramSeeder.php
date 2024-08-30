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
        $sectorPrograms = [
            // Sektor 1: Infrastruktur
            [
                'name' => 'Pembangunan Jalan Raya',
                'description' => 'Proyek pembangunan jalan raya baru untuk menghubungkan beberapa daerah.',
                'sector_id' => 1,
            ],
            [
                'name' => 'Renovasi Jembatan',
                'description' => 'Renovasi dan perbaikan jembatan yang rusak.',
                'sector_id' => 1,
            ],
            [
                'name' => 'Perbaikan Saluran Air',
                'description' => 'Perbaikan dan peningkatan saluran air untuk mengurangi banjir.',
                'sector_id' => 1,
            ],

            // Sektor 2: Pendidikan
            [
                'name' => 'Pelatihan Guru',
                'description' => 'Pelatihan untuk meningkatkan keterampilan dan kemampuan guru.',
                'sector_id' => 2,
            ],
            [
                'name' => 'Pembangunan Laboratorium',
                'description' => 'Pembangunan laboratorium untuk sekolah-sekolah.',
                'sector_id' => 2,
            ],
            [
                'name' => 'Program Beasiswa',
                'description' => 'Beasiswa untuk siswa berprestasi dan kurang mampu.',
                'sector_id' => 2,
            ],

            // Sektor 3: Kesehatan
            [
                'name' => 'Perbaikan Rumah Sakit',
                'description' => 'Renovasi dan peningkatan fasilitas rumah sakit.',
                'sector_id' => 3,
            ],
            [
                'name' => 'Kampanye Kesehatan Masyarakat',
                'description' => 'Kampanye untuk meningkatkan kesadaran kesehatan masyarakat.',
                'sector_id' => 3,
            ],
            [
                'name' => 'Penyuluhan Kesehatan',
                'description' => 'Penyuluhan tentang penyakit umum dan pencegahannya.',
                'sector_id' => 3,
            ],

            // Sektor 4: Lingkungan
            [
                'name' => 'Program Penghijauan',
                'description' => 'Kegiatan penanaman pohon dan pelestarian lingkungan.',
                'sector_id' => 4,
            ],
            [
                'name' => 'Pembersihan Sungai',
                'description' => 'Kegiatan pembersihan sungai untuk menjaga kualitas air.',
                'sector_id' => 4,
            ],
            [
                'name' => 'Kampanye Pengurangan Sampah',
                'description' => 'Kampanye untuk mengurangi sampah dan meningkatkan daur ulang.',
                'sector_id' => 4,
            ],

            // Sektor 5: Ekonomi
            [
                'name' => 'Bantuan Usaha Kecil',
                'description' => 'Program bantuan dan pelatihan untuk usaha kecil dan menengah.',
                'sector_id' => 5,
            ],
            [
                'name' => 'Program Pemberdayaan Ekonomi',
                'description' => 'Program untuk meningkatkan keterampilan dan kemampuan wirausaha.',
                'sector_id' => 5,
            ],
            [
                'name' => 'Pembangunan Pasar',
                'description' => 'Pembangunan pasar lokal untuk mendukung pedagang kecil.',
                'sector_id' => 5,
            ],
        ];
        
        SectorProgram::insert($sectorPrograms);
    }
}
