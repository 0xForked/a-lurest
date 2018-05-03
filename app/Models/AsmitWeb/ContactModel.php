<?php

namespace App\models\AsmitWeb;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    protected $table = 'asmit_message';

    protected $fillable = [
        'id',
        'awm_sender_name',
        'awm_sender_email',
        'awm_message_title',
        'awm_message_body',
        'awm_message_status',
        'created_at',
        'updated_at',
    ];
}
