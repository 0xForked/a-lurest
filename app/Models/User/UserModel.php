<?php

namespace App\Models\User;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class UsersModel extends Model implements AuthenticatableContract, AuthorizableContract
{

    use Authenticatable, Authorizable;

    protected $table = 'users';

    protected $fillable = [
        'unique_id',
        'unique_token',
        'username',
        'phone',
        'email',
        'password',
        'activation_code',
        'forgotten_password_code',
        'forgotten_password_time',
        'remember_code',
        'status_acc'
    ];

    protected $hidden = [
        'password',
        'unique_token',
        'activation_code',
        'forgotten_password_code',
        'forgotten_password_time',
        'remember_code'
    ];

}