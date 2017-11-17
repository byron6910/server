<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker=Faker::create();
        for($i=0;$i<4;$i++){

            User::create([

                //'ci'=>$faker->randomNumber(9,false),
                'name'=>$faker->firstName(),
                'email'=>$faker->email(),
           
                'password'=>$faker->word()
            

            ]);
       
            }
        }
    
}
