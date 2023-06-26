<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('teams')->delete();
        
        \DB::table('teams')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => NULL,
                'name' => 'Libertad Gran Mamoré',
                'state' => 'beni',
                'logo' => NULL,
                'created_at' => '2023-06-07 10:00:21',
                'updated_at' => '2023-06-07 10:00:21',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => NULL,
                'name' => 'Bolivar',
                'state' => 'la paz',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:36:34',
                'updated_at' => '2023-06-24 10:36:34',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => NULL,
                'name' => 'The Strongest',
                'state' => 'la paz',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:36:51',
                'updated_at' => '2023-06-24 10:36:51',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => NULL,
                'name' => 'Oriente Petrolero',
                'state' => 'santa cruz',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:37:02',
                'updated_at' => '2023-06-24 10:37:02',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => NULL,
                'name' => 'Blooming',
                'state' => 'santa cruz',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:37:13',
                'updated_at' => '2023-06-24 10:37:13',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => NULL,
                'name' => 'Nacional Potosí',
                'state' => 'potosí',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:37:34',
                'updated_at' => '2023-06-24 10:37:34',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => NULL,
                'name' => 'Real Santa Cruz',
                'state' => 'santa cruz',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:37:57',
                'updated_at' => '2023-06-24 10:37:57',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => NULL,
                'name' => 'Universitario',
                'state' => 'chuquisaca',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:38:18',
                'updated_at' => '2023-06-24 10:38:18',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => NULL,
                'name' => 'Guabirá',
                'state' => 'santa cruz',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:38:34',
                'updated_at' => '2023-06-24 10:38:34',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => NULL,
                'name' => 'Vaca Díez',
                'state' => 'beni',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:38:51',
                'updated_at' => '2023-06-24 10:38:51',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => NULL,
                'name' => 'Wilstermann',
                'state' => 'cochabamba',
                'logo' => NULL,
                'created_at' => '2023-06-24 10:39:16',
                'updated_at' => '2023-06-24 10:39:16',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}