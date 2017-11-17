<?php

use Illuminate\Database\Seeder;
use App\Origen_Destino;
use Faker\Factory as Faker;

class OrigenDestinoSeeder extends Seeder
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

            Origen_Destino::create([

               // 'id_origen'=>$faker->randomNumber(9,false),
                'origen'=>$faker->cityPrefix(),
                'destino'=>$faker->cityPrefix(),
                'precio'=>$faker->numberBetween(3,20),
                'cantidad'=>$faker->numberBetween(10,50)
                
                


            ]);

    }
}
}
