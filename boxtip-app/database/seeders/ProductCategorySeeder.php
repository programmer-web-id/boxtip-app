<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::create(['name' => 'Books']);
        ProductCategory::create(['name' => 'Kitchenwares']);
        ProductCategory::create(['name' => 'Eletronics']);
        ProductCategory::create(['name' => 'Baby and Kids']);
        ProductCategory::create(['name' => 'Men Fashions']);
        ProductCategory::create(['name' => 'Women Fashions']);
        ProductCategory::create(['name' => 'Moms']);
        ProductCategory::create(['name' => 'Cosmetics']);
        ProductCategory::create(['name' => 'Homewares']);
        ProductCategory::create(['name' => 'F&B']);
        ProductCategory::create(['name' => 'Stationeries']);
        ProductCategory::create(['name' => 'Sports']);
        ProductCategory::create(['name' => 'Automotives']);
        ProductCategory::create(['name' => 'Pet Needs']);
        ProductCategory::create(['name' => 'Tools']);
        ProductCategory::create(['name' => 'Others']);
        ProductCategory::create(['name' => 'Phone Stuff']);
        ProductCategory::create(['name' => 'Accessories']);
    }
}
