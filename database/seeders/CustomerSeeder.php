<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ResPartner;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResPartner::create([
            'code' => 'CUST001',
            'old_code' => 'BOX001',
            'type' => 'customer',
            'name' => 'Customer 001',
            'birth_date' => '2000/01/01',
            'is_male' => True,
            'email' => 'cust001@demo.com',
            'phone' => '001001001',
            'address' => 'Jl. Tanah Abang I No.1, RT.11/RW.8, Petojo Sel., Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10160',
            'province_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
            'is_new_to_taobao' => True,
            'regular_bought_product_id' => 1,
            'service_consideration_id' => 1,
        ]);
        ResPartner::create([
            'code' => 'CUST002',
            'old_code' => 'BOX002',
            'type' => 'customer',
            'name' => 'Customer 002',
            'birth_date' => '2000/02/02',
            'is_male' => True,
            'email' => 'cust002@demo.com',
            'phone' => '002002002',
            'address' => 'Jl. Senen Raya No.135, Senen, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10410',
            'province_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
            'is_new_to_taobao' => True,
            'regular_bought_product_id' => 2,
            'service_consideration_id' => 2,
        ]);
        ResPartner::create([
            'code' => 'CUST003',
            'old_code' => 'BOX003',
            'type' => 'customer',
            'name' => 'Customer 003',
            'birth_date' => '2000/03/03',
            'is_male' => True,
            'email' => 'cust003@demo.com',
            'phone' => '003003003',
            'address' => 'Jl. Bungur Besar Raya, RT.8/RW.7, South Gunung Sahari, Kemayoran, Central Jakarta City, Jakarta 10610',
            'province_id' => 1,
            'city_id' => 1,
            'district_id' => 1,
            'is_new_to_taobao' => True,
            'regular_bought_product_id' => 3,
            'service_consideration_id' => 3,
        ]);
    }
}
