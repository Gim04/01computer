<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ManufacturersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/manufacturers.csv"), "r");
  

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                Manufacturer::create([
                    'id' => $data['0'],
                    'country_id' => $data['1'],
                    'name' => $data['2'],
                ]);    

        }
   
        fclose($csvFile);
        
        
    }
}