<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = "12345678";
        $partner_name = fake()->name();
        $partner_email = 'mitra@localhost.test';
        User::create([
            'avatar' => Str::random(10).'.png',
            'name' => 'admin',
            'email' => 'admin@localhost.test',
            'password' => Hash::make($password),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        User::create([
            'avatar' => Str::random(10).'.png',
            'name' => $partner_name,
            'email' => $partner_email,
            'password' => Hash::make($password),
            'role' => 'partner',
            'email_verified_at' => now(),
        ]);
        User::create([
            'avatar' => Str::random(10).'.png',
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make($password),
            'role' => 'bupati',
        ]);

        User::create([
            'name' => 'hasban',
            'email' => 'hasbanfardani77@gmail.com',
            'password' => Hash::make($password),
            'role' => 'partner',
        ]);

        Partner::create([
            'logo' => Str::random(10).'.png',
            'company_name' => 'Perusahaan '.$partner_name,
            'email' => $partner_email,
            'phone' => '08'.rand(10000000,9999999999),
            'address' => 'Jalan '.fake()->name().' no. '.rand(1,999),
            'description' => 'Lorem ipsum dolor sit amet',
            'is_active' => true,
        ]);

        Partner::create([
            'logo' => Str::random(10).'.png',
            'company_name' => 'Perusahaan '.fake()->name(),
            'email' => 'hasbanfardani77@gmail.com',
            'phone' => '08'.rand(10000000,9999999999),
            'address' => 'Jalan '.fake()->name().' no. '.rand(1,999),
            'description' => 'Lorem ipsum dolor sit amet',
            'is_active' => false,
        ]);
    }
}
