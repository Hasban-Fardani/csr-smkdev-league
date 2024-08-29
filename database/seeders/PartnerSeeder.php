<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'logo' => 'storage/logos/company1.png',
                'company_name' => 'Localhost',
                'email' => 'mitra@localhost.test',
                'phone' => '08'.rand(10000000,9999999999),
                'address' => 'Jalan '.fake()->name().' no. '.rand(1,999),
                'description' => 'Lorem ipsum dolor sit amet',
                'is_active' => true,
            ],
            [
                'logo' => 'storage/logos/company1.png',
                'company_name' => 'Artisan code Champions',
                'email' => 'hasbanfardani77@gmail.com',
                'phone' => '08'.rand(10000000,9999999999),
                'address' => 'Jalan '.fake()->name().' no. '.rand(1,999),
                'description' => 'Lorem ipsum dolor sit amet',
                'is_active' => true,
            ],
            [
                'logo' => 'storage/logos/company1.png',
                'company_name' => 'PT Cirebon Jaya',
                'email' => 'info@cirebonjaya.com',
                'phone' => '02123456789',
                'address' => 'Jl. Siliwangi No.1, Cirebon',
                'description' => 'Perusahaan perdagangan dan distribusi barang kebutuhan pokok.',
                'is_active' => true,
            ],
            [
                'logo' => 'storage/logos/company2.png',
                'company_name' => 'CV Mega Utama',
                'email' => 'contact@megautama.com',
                'phone' => '02198765432',
                'address' => 'Jl. Kartini No.5, Cirebon',
                'description' => 'Perusahaan konstruksi dan pengembang properti di Cirebon.',
                'is_active' => true,
            ],
            [
                'logo' => 'storage/logos/company3.png',
                'company_name' => 'PT Sumber Berkah',
                'email' => 'info@sumberberkah.com',
                'phone' => '02134567890',
                'address' => 'Jl. Dr. Cipto No.10, Cirebon',
                'description' => 'Penyedia layanan logistik dan transportasi darat.',
                'is_active' => true,
            ],
            [
                'logo' => 'storage/logos/company4.png',
                'company_name' => 'CV Mandiri Sejahtera',
                'email' => 'support@mandirisejahtera.com',
                'phone' => '02122334455',
                'address' => 'Jl. Kesambi No.8, Cirebon',
                'description' => 'Penyedia layanan keuangan dan konsultan bisnis.',
                'is_active' => false,
            ],
            [
                'logo' => 'storage/logos/company5.png',
                'company_name' => 'PT Indah Makmur',
                'email' => 'info@indahmakmur.com',
                'phone' => '02155667788',
                'address' => 'Jl. Pemuda No.3, Cirebon',
                'description' => 'Perusahaan manufaktur produk plastik dan kemasan.',
                'is_active' => true,
            ],
        ];

        Partner::insert($partners);
    }
}
