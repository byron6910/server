<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table='clientes';
    protected $primaryKey='ci';
    protected $fillable=['nombre','apellido','telefono','ciudad','calle','postal','correo','usuario','password','foto'];
    protected $hidden=['created_at','updated_at'];

    protected $dates = ['deleted_at'];
    

    //relaciones
    public function reservas(){
        return  $this->hasMany('App\Reserva','id_reserva');
    }
}
