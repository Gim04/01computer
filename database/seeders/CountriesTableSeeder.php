<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/country.csv"), "r");
  
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                Country::create([
                    'id' => $data['0'],
                    'name' => $data['1'],

                ]);    
        }
   
        fclose($csvFile);
    }
}
