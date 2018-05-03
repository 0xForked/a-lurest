<?php

namespace App\models\AsmitWeb;

use Illuminate\Database\Eloquent\Model;

class ArticleCategoryModel extends Model
{
    protected $table = 'asmit_category';

    protected $fillable = [
        'id',
        'awac_slug',
        'awac_title',
        'awac_description',
        'awac_count'
    ];
}
