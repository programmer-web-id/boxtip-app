<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ResPartner;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResPartner::create([
            'code' => 'VEND001',
            'old_code' => 'VBX001',
            'type' => 'vendor',
            'name' => 'Vendor 001',
            'birth_date' => '2000/01/01',
            'is_male' => True,
            'email' => 'vend001@demo.com',
            'phone' => '010101',
            'address' => 'Jl. Tanah Abang II, RW.5, Petojo Sel., Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10160',
            'province_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
        ]);
        ResPartner::create([
            'code' => 'VEND002',
            'old_code' => 'VBX002',
            'type' => 'vendor',
            'name' => 'Vendor 002',
            'birth_date' => '2000/02/02',
            'is_male' => True,
            'email' => 'vend002@demo.com',
            'phone' => '020202',
            'address' => 'Jl. Medan Merdeka Utara No.2, RT.5/RW.2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110',
            'province_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
        ]);
    }
}
