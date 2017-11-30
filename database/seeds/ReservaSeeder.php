<?php

use Illuminate\Database\Seeder;

use App\Reserva;
use App\Cliente;
use App\Viaje;
use App\User;

use Faker\Factory as Faker;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $faker=Faker::create();
        $cantidad=Cliente::all()->count();
        $cantidad1=Viaje::all()->count();
        $cantidad2=User::all()->count();
        
        
        for($i=0;$i<$cantidad;$i++){
            for($j=0;$j<$cantidad1;$j++){
                for($k=0;$k<$cantidad2;$k++){
                

            Reserva::create([

               // 'ci_conductor'=>$faker->randomNumber(9,false),
                'fecha_reserva'=>$faker->date(),
                'estado'=>$faker->boolean(),
                
                'asiento'=>$faker->numberBetween(3,20),
                'cantidad'=>$faker->numberBetween(10,50),
                
                'ci'=>$faker->numberBetween(1,$cantidad),
                'id_viaje'=>$faker->numberBetween(1,$cantidad1),
                'id'=>$faker->numberBetween(1,$cantidad2)
                

            ]);
    }
}
        } 
    }
}
