<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;


class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $clothes = ProductCategory::create(['name' => 'Clothes'  , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => null]);
        ProductCategory::create(['name' => 'Women\'s T-Shirts'   , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => $clothes->id]);
        ProductCategory::create(['name' => 'Men\'s T-Shirts'     , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => $clothes->id]);
        ProductCategory::create(['name' => 'Dresses'             , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => $clothes->id]);
        ProductCategory::create(['name' => 'Novelty socks'       , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => $clothes->id]);
        ProductCategory::create(['name' => 'Women\'s sunglasses' , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => $clothes->id]);
        ProductCategory::create(['name' => 'Men\'s sunglasses'   , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'clothes.jpg', 'status' => true, 'parent_id' => $clothes->id]);

        $shoes = ProductCategory::create(['name' => 'Shoes'     , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'shoes.jpg', 'status' => true]);
        ProductCategory::create(['name' => 'Women\'s Shoes'     , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $shoes->id]);
        ProductCategory::create(['name' => 'Men\'s Shoes'       , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $shoes->id]);
        ProductCategory::create(['name' => 'Boy\'s Shoes'       , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $shoes->id]);
        ProductCategory::create(['name' => 'Girls\'s Shoes'     , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $shoes->id]);

        $watches = ProductCategory::create(['name' => 'Watches' , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'watches.jpg', 'status' => true]);
        ProductCategory::create(['name' => 'Women\'s Watches'   , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $watches->id]);
        ProductCategory::create(['name' => 'Men\'s Watches'     , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $watches->id]);
        ProductCategory::create(['name' => 'Boy\'s Watches'     , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $watches->id]);
        ProductCategory::create(['name' => 'Girls\'s Watches'   , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'shoes.jpg', 'status' => true, 'parent_id' => $watches->id]);

        $electronics = ProductCategory::create(['name' => 'Electronics'    , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'electronics.jpg', 'status' => true]);
        ProductCategory::create(['name' => 'Electronics'                   , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'electronics.jpg', 'status' => true, 'parent_id' => $electronics->id]);
        ProductCategory::create(['name' => 'USB Flash drives'              , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'electronics.jpg', 'status' => true, 'parent_id' => $electronics->id]);
        ProductCategory::create(['name' => 'Headphones'                    , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'electronics.jpg', 'status' => true, 'parent_id' => $electronics->id]);
        ProductCategory::create(['name' => 'Portable speakers'             , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'electronics.jpg', 'status' => true, 'parent_id' => $electronics->id]);
        ProductCategory::create(['name' => 'Cell Phone bluetooth headsets' , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'electronics.jpg', 'status' => true, 'parent_id' => $electronics->id]);
        ProductCategory::create(['name' => 'Keyboards'                     , 'slug' => rand( 0, 1000000000000000) , 'cover' => 'electronics.jpg', 'status' => true, 'parent_id' => $electronics->id]);
    }
}
