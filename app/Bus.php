<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table='bus';
    protected $primaryKey='id_bus';
    protected $fillable=['capacidad','nombre','condicion','id_cooperativa'];
    protected $hidden=['created_at','updated_at'];
    

    public function conductores(){
        return  $this->hasMany('App\Conductor','id_conductor');
    }
    public function cooperativa(){
        return $this->belongsTo('App\Cooperativa');
    }
}
