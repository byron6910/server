<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Origen_Destino extends Model
{
    protected $table='origen_destino';
    protected $primaryKey='id_origen_destino';
    protected $fillable=['origen','destino','precio','cantidad'];
    protected $hidden=['created_at','updated_at'];

    public function horarios(){
        return  $this->hasMany('App\Horarios','id_horario');
    }
}
