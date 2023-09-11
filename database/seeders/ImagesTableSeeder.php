<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
 
class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Images')->delete();
        DB::table('Images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 0,
                'item_id' => 0,
                'path' => "photos/foyer/shelves/icons/DSC_0141.JPG",
                'description' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'category_id' => 0,
                'item_id' => 0,
                'path' => "photos/foyer/shelves/icons/DSC_0144.JPG",
                'description' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            
        ));
    }
}
