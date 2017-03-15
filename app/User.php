<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
    'user_type_id', 'name', 'last_name', 'username', 'password', 'phone', 'status', 'email', 'sex', 'dni', 'date_last_connect', 'ip', 'remember_token'
    ];

    const STATUS_ACTIVE   = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';

    protected $hidden = [
        'password', 'remember_token',
    ];
}
