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
        $activities = [
            [
                'image' => 'storage/images/bg-kegiatan-1.png',
                'name' => 'Pembukaan Acara Festival Budaya',
                'description' => 'Acara pembukaan festival budaya tahunan di Cirebon.',
                'is_draft' => false,
                'tags' => json_encode(['festival', 'budaya', 'cirebon']),
                'admin_id' => 1,
                'published_data' => '2024-08-20',
            ],
            [
                'image' => 'storage/images/bg-kegiatan-2.png',
                'name' => 'Workshop Kerajinan Tangan',
                'description' => 'Pelatihan kerajinan tangan untuk masyarakat sekitar.',
                'is_draft' => false,
                'tags' => json_encode(['workshop', 'kerajinan', 'pelatihan']),
                'admin_id' => 1,
                'published_data' => '2024-08-22',
            ],
            [
                'image' => 'storage/images/bg-kegiatan-3.png',
                'name' => 'Seminar Kesehatan',
                'description' => 'Seminar tentang pentingnya pola hidup sehat.',
                'is_draft' => true,
                'tags' => json_encode(['seminar', 'kesehatan', 'pola hidup']),
                'admin_id' => 1,
                'published_data' => null,
            ],
            [
                'image' => 'storage/images/bg-kegiatan-4.png',
                'name' => 'Kegiatan Donor Darah',
                'description' => 'Aksi donor darah bersama untuk membantu sesama.',
                'is_draft' => false,
                'tags' => json_encode(['donor darah', 'kesehatan', 'sosial']),
                'admin_id' => 1,
                'published_data' => '2024-08-25',
            ],
            [
                'image' => 'storage/images/bg-kegiatan-1.png',
                'name' => 'Lomba Mewarnai Anak',
                'description' => 'Lomba mewarnai bagi anak-anak usia 4-7 tahun.',
                'is_draft' => true,
                'tags' => json_encode(['lomba', 'mewarnai', 'anak-anak']),
                'admin_id' => 1,
                'published_data' => null,
            ],
            [
                'image' => 'storage/images/bg-kegiatan-2.png',
                'name' => 'Kampanye Lingkungan Hijau',
                'description' => 'Kampanye untuk meningkatkan kesadaran lingkungan hijau.',
                'is_draft' => false,
                'tags' => json_encode(['kampanye', 'lingkungan', 'hijau']),
                'admin_id' => 1,
                'published_data' => '2024-08-27',
            ],
            [
                'image' => 'storage/images/bg-kegiatan-3.png',
                'name' => 'Pameran Seni Rupa',
                'description' => 'Pameran seni rupa dari berbagai seniman lokal.',
                'is_draft' => false,
                'tags' => json_encode(['pameran', 'seni rupa', 'seniman']),
                'admin_id' => 1,
                'published_data' => '2024-08-28',
            ],
            [
                'image' => 'storage/images/bg-kegiatan-4.png',
                'name' => 'Pelatihan Kewirausahaan',
                'description' => 'Pelatihan kewirausahaan untuk meningkatkan kemampuan bisnis.',
                'is_draft' => true,
                'tags' => json_encode(['pelatihan', 'kewirausahaan', 'bisnis']),
                'admin_id' => 1,
                'published_data' => null,
            ],
            [
                'image' => 'storage/images/bg-kegiatan-1.png',
                'name' => 'Pertunjukan Musik Akustik',
                'description' => 'Pertunjukan musik akustik oleh band lokal.',
                'is_draft' => false,
                'tags' => json_encode(['musik', 'akustik', 'pertunjukan']),
                'admin_id' => 1,
                'published_data' => '2024-08-29',
            ],
            [
                'image' => 'storage/images/bg-kegiatan-2.png',
                'name' => 'Penanaman Pohon Bersama',
                'description' => 'Kegiatan penanaman pohon bersama di area hijau.',
                'is_draft' => false,
                'tags' => json_encode(['penanaman', 'pohon', 'lingkungan']),
                'admin_id' => 1,
                'published_data' => '2024-08-30',
            ],
        ];

        Activity::insert($activities);
    }
}
