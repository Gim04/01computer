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
    }
}
