<?php

namespace Database\Seeders;

use App\Models\Computer;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/computers.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Computer::create([
                    'id' => $data['0'],
                    'bool_position' => $data['1'],
                    'position_id' => $data['2'],
                    'inventory_number'  => $data['3'],
                    'serial_number'  => $data['4'],
                    'manufacturer_id' => $data['5'],
                    'model' => $data['6'],
                    'submodel'  => $data['7'],
                    'year'  => $data['8'],
                    'power_type'  => $data['9'],
                    'power_rating' => $data['10'],
                    'speed' => $data['11'],
                    'processor' => $data['12'],
                    'bit'  => $data['13'],
                    'keyboard'  => $data['14'],
                    'monitor' => $data['15'],
                    'icon' => $data['16'],
                    'description' => $data['17'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
        
        
    }
}