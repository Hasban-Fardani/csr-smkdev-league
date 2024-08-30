<?php

namespace Database\Seeders;

use App\Models\Subdistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubdistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subdistricts = [
            ['name' => 'Arjawinangun'],
            ['name' => 'Astanajapura'],
            ['name' => 'Babakan'],
            ['name' => 'Beber'],
            ['name' => 'Ciledug'],
            ['name' => 'Ciwaringin'],
            ['name' => 'Depok'],
            ['name' => 'Dukupuntang'],
            ['name' => 'Gebang'],
            ['name' => 'Gegesik'],
            ['name' => 'Greged'],
            ['name' => 'Gunung Jati'],
            ['name' => 'Jamblang'],
            ['name' => 'Kaliwedi'],
            ['name' => 'Kapetakan'],
            ['name' => 'Karangsembung'],
            ['name' => 'Karangwareng'],
            ['name' => 'Kedawung'],
            ['name' => 'Klangenan'],
            ['name' => 'Lemahabang'],
            ['name' => 'Losari'],
            ['name' => 'Mundu'],
            ['name' => 'Pabedilan'],
            ['name' => 'Pabuaran'],
            ['name' => 'Palimanan'],
            ['name' => 'Pangenan'],
            ['name' => 'Panguragan'],
            ['name' => 'Pasaleman'],
            ['name' => 'Plered'],
            ['name' => 'Plumbon'],
            ['name' => 'Sedong'],
            ['name' => 'Sumber'],
            ['name' => 'Suranenggala'],
            ['name' => 'Susukan'],
            ['name' => 'Susukan Lebak'],
            ['name' => 'Talun'],
            ['name' => 'Tengah Tani'],
            ['name' => 'Waled'],
            ['name' => 'Weru'],
        ];

        Subdistrict::insert($subdistricts);
    }
}
