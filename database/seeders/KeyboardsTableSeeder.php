<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeyboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Keyboards')->delete();
        DB::table('Keyboards')->insert(array (
            0 => 
            array (
                'id' => 1,
                'bool_position' => 0,
                'position_id' => 2,
                'manufacturer_id' => 1,
                'inventory_number' => '01',
                'serial_number' => '42546464672772',
                'model' => 'Apple II',
                'layout' => 'Apple',
                'switch' => 'MOS 6502',
                'year' => '1977',
                'description' => 'The Apple II is an 8-bit home computer and one of the world\'s first highly successful mass-produced microcomputer products.',
                'icon' => 'photo/img_0.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'bool_position' => 1,
                'position_id' => 1,
                'manufacturer_id' => 1,
                'inventory_number' => 'C0003',
                'serial_number' => 'VM138FLLR',
                'model' => 'Apple IMac',
                'layout' => 'Apple',
                'switch' => 'MOS 6502',
                'year' => '2000',
                'description' => '',
                'icon' => 'photo/img_1.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'bool_position' => 0,
                'position_id' => 2,
                'manufacturer_id' => 1,
                'inventory_number' => '01',
                'serial_number' => '42546464672772',
                'model' => 'Apple II',
                'layout' => 'Apple',
                'switch' => 'MOS 6502',
                'year' => '1979',
                'description' => 'The Apple II is an 8-bit home computer and one of the world\'s first highly successful mass-produced microcomputer products.',
                'icon' => 'photo/img_2.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'bool_position' => 1,
                'position_id' => 1,
                'manufacturer_id' => 1,
                'inventory_number' => 'C0003',
                'serial_number' => 'VM138FLLR',
                'model' => 'Apple IMac',
                'layout' => 'Apple',
                'switch' => 'MOS 6502',
                'year' => '2010',
                'description' => '',
                'icon' => 'photo/img_2.jpg',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            )
        ));
    }
}
