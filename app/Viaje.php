<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Viaje extends Model
{
    protected $table='viaje';
    protected $primaryKey='id_viaje';
    protected $fillable=['estado','id_cooperativa','id_horario'];
    protected $hidden=['created_at','updated_at'];
    

    public function reservas(){
        return  $this->hasMany('App\Reserva','id_reserva');
    }

    public function cooperativa(){
        return  $this->belongsTo('App\Cooperativa');
    }

    public function horario(){
        return  $this->belongsTo('App\Horarios');
    }
}
