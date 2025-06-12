<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Note this import
use Illuminate\Notifications\Notifiable;

class AddUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'add_users';

    // Add your fillable, hidden, casts etc.

    // Example:
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'ipaddress',
        'city',
        'state',
        'zipcode',
        'password',
        'user_type',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
