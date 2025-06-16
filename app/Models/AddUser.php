<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Note this import
use Illuminate\Notifications\Notifiable;
	use App\Notifications\CustomResetPassword;

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
		'services_used',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

public function sendPasswordResetNotification($token)
{
    $this->notify(new CustomResetPassword($token));
}

}
