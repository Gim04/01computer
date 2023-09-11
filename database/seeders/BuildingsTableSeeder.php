<?php

namespace Database\Seeders;

use App\Models\Building;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/buildings.csv"), "r");

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                Building::create([
                    'id' => $data['0'],
                    'country' => $data['1'],
                    'city' => $data['2'],
                    'address'  => $data['3'],
                    'civic_n'  => $data['4'],
                    'cap' => $data['5'],

                ]);    
        }
   
        fclose($csvFile);
    }
}
