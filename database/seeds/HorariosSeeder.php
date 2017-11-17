<?php

use Illuminate\Database\Seeder;

use App\Horarios;
use App\Origen_Destino;

use Faker\Factory as Faker;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $cantidad=Origen_Destino::all()->count();

        for($i=0;$i<$cantidad;$i++){

            Horarios::create([

               // 'ci_conductor'=>$faker->randomNumber(9,false),
                'fecha_horario'=>$faker->date(),
                'hora'=>$faker->time(),
               
                
                'id_origen_destino'=>$faker->numberBetween(1,$cantidad),


            ]);
    }
}
}
