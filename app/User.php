<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $fillable = [
         'name','email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays. 'name','remember_token'
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected $dates = ['deleted_at'];
      //relaciones
      public function reservas(){
        return  $this->hasMany('App\Reserva','id_reserva');
    }

    public function getIsAdminAtribute(){

    return $this->role==0;
    }



    public function getIsSuportAtribute(){
        
        return $this->role==1;
    }
}
