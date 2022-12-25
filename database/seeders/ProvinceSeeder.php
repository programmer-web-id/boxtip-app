<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create(["id" => 1, "name" => "ACEH"]);
        Province::create(["id" => 2, "name" => "SUMATERA UTARA"]);
        Province::create(["id" => 3, "name" => "SUMATERA BARAT"]);
        Province::create(["id" => 4, "name" => "RIAU"]);
        Province::create(["id" => 5, "name" => "JAMBI"]);
        Province::create(["id" => 6, "name" => "SUMATERA SELATAN"]);
        Province::create(["id" => 7, "name" => "BENGKULU"]);
        Province::create(["id" => 8, "name" => "LAMPUNG"]);
        Province::create(["id" => 9, "name" => "KEPULAUAN BANGKA BELITUNG"]);
        Province::create(["id" => 10, "name" => "KEPULAUAN RIAU"]);
        Province::create(["id" => 11, "name" => "DKI JAKARTA"]);
        Province::create(["id" => 12, "name" => "JAWA BARAT"]);
        Province::create(["id" => 13, "name" => "JAWA TENGAH"]);
        Province::create(["id" => 14, "name" => "DI YOGYAKARTA"]);
        Province::create(["id" => 15, "name" => "JAWA TIMUR"]);
        Province::create(["id" => 16, "name" => "BANTEN"]);
        Province::create(["id" => 17, "name" => "BALI"]);
        Province::create(["id" => 18, "name" => "NUSA TENGGARA BARAT"]);
        Province::create(["id" => 19, "name" => "NUSA TENGGARA TIMUR"]);
        Province::create(["id" => 20, "name" => "KALIMANTAN BARAT"]);
        Province::create(["id" => 21, "name" => "KALIMANTAN TENGAH"]);
        Province::create(["id" => 22, "name" => "KALIMANTAN SELATAN"]);
        Province::create(["id" => 23, "name" => "KALIMANTAN TIMUR"]);
        Province::create(["id" => 24, "name" => "KALIMANTAN UTARA"]);
        Province::create(["id" => 25, "name" => "SULAWESI UTARA"]);
        Province::create(["id" => 26, "name" => "SULAWESI TENGAH"]);
        Province::create(["id" => 27, "name" => "SULAWESI SELATAN"]);
        Province::create(["id" => 28, "name" => "SULAWESI TENGGARA"]);
        Province::create(["id" => 29, "name" => "GORONTALO"]);
        Province::create(["id" => 30, "name" => "SULAWESI BARAT"]);
        Province::create(["id" => 31, "name" => "MALUKU"]);
        Province::create(["id" => 32, "name" => "MALUKU UTARA"]);
        Province::create(["id" => 33, "name" => "PAPUA"]);
        Province::create(["id" => 34, "name" => "PAPUA BARAT"]);
    }
}
