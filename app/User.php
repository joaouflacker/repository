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
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // funcao que traz a compra pelo usuario
    public function purchases(){
        return $this->hasMany('App\Purchases', 'user_id');
    }

    // funcao que traz a compra pelo usuario
    public function requisitions(){
        return $this->hasMany('App\Requisitions', 'user_id');
    }
}
