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
        $this->call(ComputersTableSeeder::class);
        $this->call(ManufacturersTableSeeder::class);
        $this->call(ContainersTableSeeder::class);
        $this->call(ShelvesTableSeeder::class);
        $this->call(MonitorsTableSeeder::class);
        $this->call(KeyboardsTableSeeder::class);
        $this->call(JoysticksTableSeeder::class);
        $this->call(BuildingsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(UnitiesTableSeeder::class);
        $this->call(ZonesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
    }
}
