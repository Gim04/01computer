<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('Menus')->delete();
        DB::table('Menus')->insert(array (
            0 => 
            array (
                'link'       => 'dashboard',
                'name'      => 'Dashboard'
            ),
            1 =>
            array (
                'link'       => 'admin/permission',
                'name'      => 'Permissions'
            ),
            2 => 
            array (
                'link'       => 'admin/role',
                'name'      => 'Roles'
            ),
            3 =>
            array (
                'link'       => 'admin/user',
                'name'      => 'Users'
            ),
            4 => 
            array (
                'link'       => 'admin/menu',
                'name'      => 'Menu'
            ),
            5 => 
            array (
                'link'       => 'computer',
                'name'      => 'Computers'
            ),
            6 => 
            array (
                'link'       => 'joystick',
                'name'      => 'Joysticks'
            ),
            7 => 
            array (
                'link'       => 'keyboard',
                'name'      => 'Keyboards'
            ),
            8 => 
            array (
                'link'       => 'monitor',
                'name'      => 'Monitors'
            )
        ));
        
        
    }
}