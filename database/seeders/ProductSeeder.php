<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $categories = ProductCategory::whereNotNull('parent_id')->pluck('id');

        for ($i = 1; $i <= 1000; $i++) {
            $products[] = [
                'name'                  => $faker->sentence(2, true),
                'slug'                  => $faker->unique()->slug(2, true),
                'description'           => $faker->paragraph,
                'price'                 => $faker->numberBetween(5, 200),
                'quantity'              => $faker->numberBetween(10, 100),
                'product_category_id'   => $categories->random(),
                'featured'              => rand(0, 1),
                'status'                => true,
                'created_at'            => now(),
                'updated_at'            => now(),
            ];
            // if($i < 100) {
            //     DB::table('taggables')->insert([
            //         'tag_id'        => rand(1, 5),
            //         'taggable_id'   => $i,
            //         'taggable_type' => 'tag',
            //     ]);
            // }
        }



        $chunks = array_chunk($products, 100);
        foreach ($chunks as $chunk) {
            Product::insert($chunk);
        }
    }
}
