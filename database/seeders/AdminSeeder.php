<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'name' => 'Admin',
           'email' => env('ADMIN_EMAIL', 'admin@' . env('APP_HOST', 'localhost')),
           'email_verified_at' => now(),
           'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
        ]);
    }
}
