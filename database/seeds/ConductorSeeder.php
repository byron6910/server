<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Conductor;
use App\Bus;

use Faker\Factory as Faker;

class ConductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $cantidad=Bus::all()->count();

        for($i=0;$i<$cantidad;$i++){

            Conductor::create([

               // 'ci_conductor'=>$faker->randomNumber(9,false),
                'nombre'=>$faker->firstName(),
                'apellido'=>$faker->lastName(),
                'telefono'=>$faker->randomNumber(9,false),
                'direccion'=>$faker->streetAddress(),
                
                'correo'=>$faker->email(),
                
                'foto'=>$faker->word(),
                'id_bus'=>$faker->numberBetween(1,$cantidad),


            ]);
    }
    }
}
