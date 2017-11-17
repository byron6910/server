<?php

use Illuminate\Database\Seeder;
use App\Cliente;
use Faker\Factory as Faker;
class CLienteSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0;$i<9;$i++){

            Cliente::create([

                //'ci'=>$faker->randomNumber(9,false),
                'nombre'=>$faker->firstName(),
                'apellido'=>$faker->lastName(),
                'telefono'=>$faker->randomNumber(9,false),
                'ciudad'=>$faker->city(),
                'calle'=>$faker->streetName(),
                'postal'=>$faker->postcode(),
                
                'correo'=>$faker->email(),
                'usuario'=>$faker->word(),
                'password'=>$faker->word(),
                'foto'=>$faker->word(),


            ]);
        }
    }
}
