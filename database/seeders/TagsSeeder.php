<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Faker\Factory;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Tag::create(['name' => 'Clothes'     , 'status' => true , 'slug' => $faker->unique()->slug(2, true), 'product_category_id' => 2]);
        Tag::create(['name' => 'Shoes'       , 'status' => true , 'slug' => $faker->unique()->slug(2, true), 'product_category_id' => 2]);
        Tag::create(['name' => 'Watches'     , 'status' => true , 'slug' => $faker->unique()->slug(2, true), 'product_category_id' => 2]);
        Tag::create(['name' => 'Electronics' , 'status' => true , 'slug' => $faker->unique()->slug(2, true), 'product_category_id' => 2]);
        Tag::create(['name' => 'Men'         , 'status' => true , 'slug' => $faker->unique()->slug(2, true), 'product_category_id' => 2]);
        Tag::create(['name' => 'Women'       , 'status' => true , 'slug' => $faker->unique()->slug(2, true), 'product_category_id' => 2]);
        Tag::create(['name' => 'Boys'        , 'status' => true , 'slug' => $faker->unique()->slug(2, true), 'product_category_id' => 2]);
        Tag::create(['name' => 'Girls'       , 'status' => true , 'slug' => $faker->unique()->slug(2, true), 'product_category_id' => 2]);
    }
}
