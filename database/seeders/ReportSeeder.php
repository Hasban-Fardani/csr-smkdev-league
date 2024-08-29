<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reports = [
            [
                'title' => 'Laporan Kemajuan Pembangunan Jalan Raya Penghubung Desa',
                'files' => json_encode(['storages/images/jalan-raya-progress-1.png', 'storages/images/jalan-raya-progress-2.png', 'storages/images/jalan-raya-progress-3.png']),
                'description' => 'Laporan ini mencakup kemajuan pembangunan jalan raya sepanjang 5 km dari total 10 km yang direncanakan. Termasuk analisis tantangan dan solusi yang diterapkan.',
                'funds' => 5000000000,
                'status' => 'diterima',
                'realization_date' => now()->subDays(30),
                'project_id' => 1,
                'partner_id' => 4,
            ],
            [
                'title' => 'Evaluasi Tengah Tahun Pembangunan Laboratorium IPA',
                'files' => json_encode(['storages/images/lab-ipa-progress-1.png', 'storages/images/lab-ipa-progress-2.png']),
                'description' => 'Laporan evaluasi tengah tahun untuk proyek pembangunan laboratorium IPA di SMA Negeri 1 Astanajapura. Mencakup penilaian kualitas bangunan dan peralatan yang telah dipasang.',
                'funds' => 750000000,
                'status' => 'draf',
                'realization_date' => now()->subDays(15),
                'project_id' => 2,
                'partner_id' => 2,
            ],
            [
                'title' => 'Laporan Akhir Renovasi Puskesmas Babakan',
                'files' => json_encode(['storages/images/puskesmas-final-1.png', 'storages/images/puskesmas-final-2.png', 'storages/images/puskesmas-final-3.png']),
                'description' => 'Laporan akhir proyek renovasi dan peningkatan fasilitas Puskesmas Babakan. Termasuk dokumentasi fasilitas baru dan peningkatan layanan yang dapat diberikan.',
                'funds' => 2000000000,
                'status' => 'diterima',
                'realization_date' => now()->subDays(7),
                'project_id' => 3,
                'partner_id' => 3,
            ],
            [
                'title' => 'Progres Pembangunan Taman Kota Hijau Beber',
                'files' => json_encode(['storages/images/taman-kota-progress-1.png', 'storages/images/taman-kota-progress-2.png']),
                'description' => 'Laporan kemajuan pembangunan taman kota hijau di Beber. Mencakup perkembangan penanaman pohon dan pembangunan fasilitas rekreasi.',
                'funds' => 3000000000,
                'status' => 'draf',
                'realization_date' => now()->subDays(10),
                'project_id' => 4,
                'partner_id' => 5,
            ],
            [
                'title' => 'Laporan Tahap Awal Revitalisasi Pasar Tradisional Ciledug',
                'files' => json_encode(['storages/images/pasar-ciledug-awal-1.png', 'storages/images/pasar-ciledug-awal-2.png']),
                'description' => 'Laporan tahap awal proyek revitalisasi pasar tradisional di Ciledug. Termasuk survei kondisi existing dan rencana detail revitalisasi.',
                'funds' => 1500000000,
                'status' => 'draf',
                'realization_date' => now()->subDays(20),
                'project_id' => 5,
                'partner_id' => 1,
            ],
            [
                'title' => 'Evaluasi Dampak Pembangunan Jalan Raya terhadap Ekonomi Lokal',
                'files' => json_encode(['storages/images/evaluasi-ekonomi-1.png', 'storages/images/evaluasi-ekonomi-2.png']),
                'description' => 'Laporan evaluasi dampak pembangunan jalan raya penghubung desa terhadap perekonomian lokal. Mencakup analisis peningkatan mobilitas dan akses pasar.',
                'funds' => 200000000,
                'status' => 'diterima',
                'realization_date' => now()->subDays(5),
                'project_id' => 1,
                'partner_id' => 6,
            ],
            [
                'title' => 'Laporan Pengadaan Peralatan Laboratorium IPA',
                'files' => json_encode(['storages/images/peralatan-lab-1.png', 'storages/images/peralatan-lab-2.png', 'storages/images/peralatan-lab-3.png']),
                'description' => 'Laporan rinci mengenai pengadaan dan instalasi peralatan untuk laboratorium IPA di SMA Negeri 1 Astanajapura. Termasuk daftar inventaris dan panduan penggunaan.',
                'funds' => 1000000000,
                'status' => 'revisi',
                'realization_date' => now()->subDays(12),
                'project_id' => 2,
                'partner_id' => 7,
            ],
            [
                'title' => 'Analisis Peningkatan Layanan Kesehatan Puskesmas Babakan',
                'files' => json_encode(['storages/images/analisis-layanan-1.png', 'storages/images/analisis-layanan-2.png']),
                'description' => 'Laporan analisis peningkatan kualitas dan kuantitas layanan kesehatan di Puskesmas Babakan pasca renovasi. Termasuk data statistik kunjungan pasien dan kepuasan masyarakat.',
                'funds' => 300000000,
                'status' => 'revisi',
                'realization_date' => now()->subDays(3),
                'project_id' => 3,
                'partner_id' => 3,
            ],
            [
                'title' => 'Laporan Penanaman Pohon dan Vegetasi di Taman Kota Beber',
                'files' => json_encode(['storages/images/penanaman-pohon-1.png', 'storages/images/penanaman-pohon-2.png', 'storages/images/penanaman-pohon-3.png']),
                'description' => 'Laporan detail mengenai jenis dan jumlah pohon serta vegetasi yang ditanam di Taman Kota Hijau Beber. Termasuk rencana perawatan dan pemeliharaan jangka panjang.',
                'funds' => 500000000,
                'status' => 'diterima',
                'realization_date' => now()->subDays(8),
                'project_id' => 4,
                'partner_id' => 5,
            ],
            [
                'title' => 'Progres Renovasi Kios dan Fasilitas Pasar Tradisional Ciledug',
                'files' => json_encode(['storages/images/renovasi-kios-1.png', 'storages/images/renovasi-kios-2.png']),
                'description' => 'Laporan kemajuan renovasi kios pedagang dan fasilitas umum di Pasar Tradisional Ciledug. Mencakup perbaikan sistem drainase dan pengelolaan sampah.',
                'funds' => 2500000000,
                'status' => 'revisi',
                'realization_date' => now()->subDays(2),
                'project_id' => 5,
                'partner_id' => 4,
            ],
        ];

        Report::insert($reports);
    }
}
