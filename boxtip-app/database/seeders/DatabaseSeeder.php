<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'name' => 'Andry',
            'email' => 'andry@demo.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('service_considerations')->insert(['name' => 'Ongkos Kirim']);
        DB::table('service_considerations')->insert(['name' => 'Pelayanan Admin']);
        DB::table('service_considerations')->insert(['name' => 'Tracking Status']);
        DB::table('service_considerations')->insert(['name' => 'Kejelasan Daftar Belanja']);
        DB::table('service_considerations')->insert(['name' => 'Kecepatan Pengiriman']);

        DB::table('product_categories')->insert(['name' => 'Books']);
        DB::table('product_categories')->insert(['name' => 'Kitchenwares']);
        DB::table('product_categories')->insert(['name' => 'Eletronics']);
        DB::table('product_categories')->insert(['name' => 'Baby and Kids']);
        DB::table('product_categories')->insert(['name' => 'Men Fashions']);
        DB::table('product_categories')->insert(['name' => 'Women Fashions']);
        DB::table('product_categories')->insert(['name' => 'Moms']);
        DB::table('product_categories')->insert(['name' => 'Cosmetics']);
        DB::table('product_categories')->insert(['name' => 'Homewares']);
        DB::table('product_categories')->insert(['name' => 'F&B']);
        DB::table('product_categories')->insert(['name' => 'Stationeries']);
        DB::table('product_categories')->insert(['name' => 'Sports']);
        DB::table('product_categories')->insert(['name' => 'Automotives']);
        DB::table('product_categories')->insert(['name' => 'Pet Needs']);
        DB::table('product_categories')->insert(['name' => 'Tools']);
        DB::table('product_categories')->insert(['name' => 'Others']);
        DB::table('product_categories')->insert(['name' => 'Phone Stuff']);
        DB::table('product_categories')->insert(['name' => 'Accessories']);


        DB::table('res_partners')->insert([
            'code' => 'CUST001',
            'old_code' => 'BOX001',
            'type' => 'customer',
            'name' => 'Customer 001',
            'birth_date' => '2000/01/01',
            'is_male' => True,
            'email' => 'cust001@demo.com',
            'phone' => '001001001',
            'address' => 'Jl. Tanah Abang I No.1, RT.11/RW.8, Petojo Sel., Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10160',
            'province' => 'Kepulauan Riau',
            'city' => 'Batam',
            'district' => 'Teluk Tering',
            'province' => 'Kepulauan Riau',
            'is_new_to_taobao' => True,
            'regular_bought_product_id' => 1,
            'service_consideration_id' => 1,
        ]);
        DB::table('res_partners')->insert([
            'code' => 'CUST002',
            'old_code' => 'BOX002',
            'type' => 'customer',
            'name' => 'Customer 002',
            'birth_date' => '2000/02/02',
            'is_male' => True,
            'email' => 'cust002@demo.com',
            'phone' => '002002002',
            'address' => 'Jl. Senen Raya No.135, Senen, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10410',
            'province' => 'Kepulauan Riau',
            'city' => 'Batam',
            'district' => 'Bengkong',
            'province' => 'Kepulauan Riau',
            'is_new_to_taobao' => True,
            'regular_bought_product_id' => 2,
            'service_consideration_id' => 2,
        ]);
        DB::table('res_partners')->insert([
            'code' => 'CUST003',
            'old_code' => 'BOX003',
            'type' => 'customer',
            'name' => 'Customer 003',
            'birth_date' => '2000/03/03',
            'is_male' => True,
            'email' => 'cust003@demo.com',
            'phone' => '003003003',
            'address' => 'Jl. Bungur Besar Raya, RT.8/RW.7, South Gunung Sahari, Kemayoran, Central Jakarta City, Jakarta 10610',
            'province' => 'Kepulauan Riau',
            'city' => 'Tanjung Balai Karimun',
            'district' => 'Teluk Tering',
            'province' => 'Kepulauan Riau',
            'is_new_to_taobao' => True,
            'regular_bought_product_id' => 3,
            'service_consideration_id' => 3,
        ]);
        DB::table('res_partners')->insert([
            'code' => 'VEND001',
            'old_code' => 'VBX001',
            'type' => 'vendor',
            'name' => 'Vendor 001',
            'birth_date' => '2000/01/01',
            'is_male' => True,
            'email' => 'vend001@demo.com',
            'phone' => '010101',
            'address' => 'Jl. Tanah Abang II, RW.5, Petojo Sel., Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10160',
            'province' => 'Kepulauan Riau',
            'city' => 'Batam',
            'district' => 'Teluk Tering',
            'province' => 'Kepulauan Riau',
            // 'is_new_to_taobao' => True,
            // 'regular_bought_product_id' => 'Pakaian',
            // 'service_consideration_id' => 'Ongkos Kirim',
        ]);
        DB::table('res_partners')->insert([
            'code' => 'VEND002',
            'old_code' => 'VBX002',
            'type' => 'vendor',
            'name' => 'Vendor 002',
            'birth_date' => '2000/02/02',
            'is_male' => True,
            'email' => 'vend002@demo.com',
            'phone' => '020202',
            'address' => 'Jl. Medan Merdeka Utara No.2, RT.5/RW.2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110',
            'province' => 'Kepulauan Riau',
            'city' => 'Batam',
            'district' => 'Bengkong',
            'province' => 'Kepulauan Riau',
            // 'is_new_to_taobao' => True,
            // 'regular_bought_product_id' => 'Makanan',
            // 'service_consideration_id' => 'Lama Pengiriman',
        ]);
        DB::table('vouchers')->insert([
            'voucher_code' => 'SIGNUP0001',
            'type' => 'personal',
            'issued_date' => '2022/11/09',
            'expired_date' => '2022/12/09',
            'used_date' => '2022/11/11',
            'remarks' => 'Sign up voucher',
        ]);
        DB::table('vouchers')->insert([
            'voucher_code' => 'SIGNUP0002',
            'type' => 'personal',
            'issued_date' => '2022/11/10',
            'expired_date' => '2022/12/10',
            'used_date' => '2022/11/11',
            'remarks' => 'Sign up voucher',
        ]);
        DB::table('vouchers')->insert([
            'voucher_code' => 'SIGNIN0003',
            'type' => 'personal',
            'issued_date' => '2022/11/12',
            'expired_date' => '2022/12/12',
            'remarks' => 'Sign up voucher',
        ]);
        DB::table('ir_sequences')->insert([
            'model' => 'res_partners',
            'sequence_code' => 'create.customer',
            'prefix' => 'BOX',
            'is_number' => true,
            'length' => 3,
            'running_number' => 1,
        ]);
        DB::table('ir_sequences')->insert([
            'model' => 'vouchers',
            'sequence_code' => 'signup.voucher',
            'prefix' => 'NEW-',
            'is_number' => false,
            'length' => 7,
        ]);
    }
}
