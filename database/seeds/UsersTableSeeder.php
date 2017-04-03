<?php

use Illuminate\Database\Seeder;
use Faker\Generator;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(['name' => 'clientTest1',
        				  'email'=>'clientTest1@gmail.com',
        				  'password' => bcrypt('123456'),
        				  'remember_token' => str_random(10) ]);
		App\User::create(['name' => 'clientTest2',
        				  'email'=>'clientTest2@gmail.com',
        				  'password' => bcrypt('123456'),
        				  'remember_token' => str_random(10) ]);
		App\User::create(['name' => 'clientTest3',
        				  'email'=>'clientTest3@gmail.com',
        				  'password' => bcrypt('123456'),
        				  'remember_token' => str_random(10) ]);
		App\User::create(['name' => 'clientTest4',
        				  'email'=>'clientTest4@gmail.com',
        				  'password' => bcrypt('123456'),
        				  'remember_token' => str_random(10) ]);
		App\User::create(['name' => 'clientTest5',
        				  'email'=>'clientTest5@gmail.com',
        				  'password' => bcrypt('123456'),
        				  'remember_token' => str_random(10) ]);

        App\Models\category::create(['name' => 'terror']);
        App\Models\category::create(['name' => 'comedia']);
        App\Models\category::create(['name' => 'accion']);
        App\Models\category::create(['name' => 'aventura']);
        App\Models\category::create(['name' => 'infantiles']);


        factory(App\Models\movie::class,10)->create();
        

        factory(App\Models\rating::class,20)->create();



    }
}
