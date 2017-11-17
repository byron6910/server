<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $primaryKey='ci';
    protected $fillable=['nombre','apellido','telefono','ciudad','calle','postal','correo','usuario','password','foto'];
    protected $hidden=['created_at','updated_at'];
    

    //relaciones
    public function reservas(){
        return  $this->hasMany('App\Reserva','id_reserva');
    }
}
