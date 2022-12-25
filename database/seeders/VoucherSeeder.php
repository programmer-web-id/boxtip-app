<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Voucher;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::create([
            'voucher_code' => 'SIGNUP0001',
            'type' => 'personal',
            'issued_date' => '2022/11/09',
            'expired_date' => '2022/12/09',
            'used_date' => '2022/11/11',
            'remarks' => 'Sign up voucher',
        ]);
        Voucher::create([
            'voucher_code' => 'SIGNUP0002',
            'type' => 'personal',
            'issued_date' => '2022/11/10',
            'expired_date' => '2022/12/10',
            'used_date' => '2022/11/11',
            'remarks' => 'Sign up voucher',
        ]);
        Voucher::create([
            'voucher_code' => 'SIGNIN0003',
            'type' => 'personal',
            'issued_date' => '2022/11/12',
            'expired_date' => '2022/12/12',
            'remarks' => 'Sign up voucher',
        ]);
    }
}
