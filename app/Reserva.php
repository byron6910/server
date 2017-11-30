<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reserva extends Model
{
    protected $table='reserva';
    protected $primaryKey='id_reserva';
    protected $fillable=['fecha_reserva','estado','ci','id_viaje','cantidad','asiento','id'];
    protected $hidden=['created_at','updated_at'];
    

    public function cliente(){
        return  $this->belongsTo('App\Cliente');
    }

    public function user(){
        return  $this->belongsTo('App\User');
    }

    public function viaje(){
        return  $this->belongs('App\Viaje');
    }
}
