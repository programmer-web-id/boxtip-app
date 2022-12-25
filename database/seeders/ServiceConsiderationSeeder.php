<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ServiceConsideration;

class ServiceConsiderationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceConsideration::create(['name' => 'Ongkos Kirim']);
        ServiceConsideration::create(['name' => 'Pelayanan Admin']);
        ServiceConsideration::create(['name' => 'Tracking Status']);
        ServiceConsideration::create(['name' => 'Kejelasan Daftar Belanja']);
        ServiceConsideration::create(['name' => 'Kecepatan Pengiriman']);
    }
}
