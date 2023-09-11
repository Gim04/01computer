<?php

namespace Database\Seeders;

use App\Models\Unity;
use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UnitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/unities.csv"), "r");
  
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                Unity::create([
                    'id' => $data['0'],
                    'zone_id' => $data['1'],
                    'code' => $data['2'],
                    'description' => $data['3'],
                ]);    
        }
   
        fclose($csvFile);
    }
}
