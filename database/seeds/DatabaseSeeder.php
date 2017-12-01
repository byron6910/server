<?php

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CLienteSeeder1::class);
         $this->call(UserTableSeeder::class);
         

         $this->call(CooperativaSeeder::class);
        
         $this->call(OrigenDestinoSeeder::class);
         $this->call(BusSeeder::class);
         $this->call(ConductorSeeder::class);
         $this->call(HorariosSeeder::class);
         $this->call(ViajeSeeder::class);
         $this->call(ReservaSeeder::class);
         
         

         
    }
}
