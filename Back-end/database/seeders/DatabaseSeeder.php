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
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserProfileSeeder::class);

        // Seeders for items
        $this->call(BrandSeeder::class);
        $this->call(ItemCategorySeeder::class);
        $this->call(ItemPersonTypeSeeder::class);
        $this->call(ItemStockStatusSeeder::class);

        //Seeders for address
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(WardSeeder::class);

        //Seeders for Payment method
        $this->call(PaymentMethodSeeder::class);
    }
}
