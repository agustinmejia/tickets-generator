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
        ));
        
        
    }
}