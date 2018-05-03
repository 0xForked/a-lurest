<?php

namespace App\models\AsmitWeb;

use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    protected $table = 'asmit_project';

    protected $fillable = [
        'id',
        'awp_author_id',
        'awp_slug',
        'awp_category',
        'awp_tags',
        'awp_title',
        'awp_description',
        'awp_headline',
        'awp_status',
        'awp_link_android',
        'awp_link_osx',
        'awp_link_web',
        'awp_link_web_demo',
        'awp_link_github',
        'awp_link_guide',
        'awp_logo',
        'created_at',
        'updated_at',
    ];
}
