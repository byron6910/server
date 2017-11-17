<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperativa extends Model
{
    protected $table='cooperativa';
    protected $primaryKey='id_cooperativa';
    protected $fillable=['nombre','direccion','telefono','correo','estado'];
    protected $hidden=['created_at','updated_at'];
    
    
    public function buses(){
        return $this->hasMany('App\Bus','id_bus');
    }
    public function viajes(){
        return $this->hasMany('App\Viajes','id_viaje');
    }
}
