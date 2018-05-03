<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicAccess extends Model
{
    protected $table = 'public_access';

    protected $fillable = [
        'access_id',
        'access_token',
        'access_email',
        'ip_address',
        'group_id',
        'access_status',
        'access_periode',
    ];

}
