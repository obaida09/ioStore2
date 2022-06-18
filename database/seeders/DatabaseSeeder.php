<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EntrustSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(ProductsImageSedder::class);
        $this->call(ProductCouponSeeder::class);
        // $this->call(ProductReviewSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(UserAddressSeeder::class);
        $this->call(ShippingCompanySeeder::class);
    }
}
