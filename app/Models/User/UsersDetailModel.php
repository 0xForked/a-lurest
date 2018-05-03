<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UsersDetailModel extends Model
{

    protected $table = 'users_details';

    protected $fillable = [
        'user_uid',
        'group_id',
        'name',
        'avatar'
    ];

}