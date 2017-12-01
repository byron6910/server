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
                'phone_number'=>$faker->randomNumber(9),
                'code_number'=>$faker->numberBetween($min = 0, $max = 999),
                
                'email'=>$faker->email(),
                'role'=>$faker->numberBetween($min = 0, $max = 2),
                'foto'=>$faker->word(),
                'confirmation_code'=>str_random(25),
                'password'=>$faker->word()
            

            ]);
       
            }
        }
    
}
