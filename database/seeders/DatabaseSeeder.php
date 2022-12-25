<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Exports\VouchersExport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Database\Seeders\UserSeeder;
use Database\Seeders\ServiceConsiderationSeeder;
use Database\Seeders\ProductCategorySeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\VendorSeeder;
use Database\Seeders\IrSequenceSeeder;
use Database\Seeders\VoucherSeeder;
use Database\Seeders\ProvinceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ServiceConsiderationSeeder::class,
            ProductCategorySeeder::class,
            CustomerSeeder::class,
            VendorSeeder::class,
            VoucherSeeder::class,
            IrSequenceSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
        ]);
    }
}
