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
        $password = "password";

        $users = [
            [
                'avatar' => 'storage/avatars/avatar-1.png',
                'name' => 'admin',
                'email' => 'admin@localhost.test',
                'password' => Hash::make($password),
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'avatar' => 'storage/avatars/avatar-1.png',
                'name' => 'mitra',
                'email' => 'mitra@localhost.test',
                'password' => Hash::make($password),
                'role' => 'partner',
                'email_verified_at' => now(),
            ],
            [
                'avatar' => 'storage/avatars/avatar-2.png',
                'name' => 'hasban',
                'email' => 'hasbanfardani77@gmail.com',
                'password' => Hash::make($password),
                'role' => 'partner',
                'email_verified_at' => null,
            ],
            [
                'avatar' => 'storage/avatars/avatar-3.png',
                'name' => 'Cirebon Jaya',
                'email' => 'info@cirebonjaya.com',
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'role' => 'partner',
                'email_verified_at' => null,
            ],
            [
                'avatar' => 'storage/avatars/avatar-1.png',
                'name' => 'Mega Utama',
                'email' => 'contact@megautama.com',
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'role' => 'partner',
                'email_verified_at' => null,
            ],
            [
                'avatar' => 'storage/avatars/avatar-2.png',
                'name' => 'Sumber Berkah',
                'email' => 'info@sumberberkah.com',
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'role' => 'partner',
                'email_verified_at' => null,
            ],
            [
                'avatar' => 'storage/avatars/avatar-3.png',
                'name' => 'Mandiri Sejahtera',
                'email' => 'support@mandirisejahtera.com',
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'role' => 'partner',
                'email_verified_at' => null,
            ],
            [
                'avatar' => 'storage/avatars/avatar-1.png',
                'name' => 'Indah Makmur',
                'email' => 'info@indahmakmur.com',
                'email_verified_at' => now(),
                'password' => Hash::make($password),
                'role' => 'partner',
                'email_verified_at' => null,
            ],
        ];

        User::insert($users);
    }
}
