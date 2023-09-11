<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/zones.csv"), "r");
  
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                Zone::create([
                    'id' => $data['0'],
                    'building_id' => $data['1'],
                    'denomination' => $data['2'],
                    'floor'  => $data['3'],
                ]);
        }
   
        fclose($csvFile);
    }
}
