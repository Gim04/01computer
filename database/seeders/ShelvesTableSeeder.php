<?php

namespace Database\Seeders;

use App\Models\Shelf;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ShelvesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/shelves.csv"), "r");
  
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                Shelf::create([
                    'id' => $data['0'],
                    'unity_id' => $data['1'],
                    'code' => $data['2'],
       
                ]);    
        }
   
        fclose($csvFile);
        
        
    }
}