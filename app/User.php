<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = [
         'name','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays. 'name','remember_token'
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

      //relaciones
      public function reservas(){
        return  $this->hasMany('App\Reserva','id_reserva');
    }
}
