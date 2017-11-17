<?php

use Illuminate\Database\Seeder;

use App\Cooperativa;
use App\Viaje;
use App\Horarios;


use Faker\Factory as Faker;

class ViajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $cantidad=Cooperativa::all()->count();
        $cantidad1=Horarios::all()->count();
        

        for($i=0;$i<$cantidad;$i++){

            for($j=0;$j<$cantidad1;$j++){

            Viaje::create([
// para relacionar dejar que sea autoincrementalble
              //  'id_bus'=>$faker->randomNumber(9,false),
                'estado'=>$faker->boolean(),
              
                
                'id_cooperativa'=>$faker->numberBetween(1,$cantidad),

                'id_horario'=>$faker->numberBetween(1,$cantidad1),
                

            ]);
    }
    }
}
}
