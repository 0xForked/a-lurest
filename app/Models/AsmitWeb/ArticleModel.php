<?php

namespace App\models\AsmitWeb;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = 'asmit_article';

    protected $fillable = [
        'id',
        'awa_author_id',
        'awa_category',
        'awa_tags',
        'awa_slug',
        'awa_title',
        'awa_content',
        'awa_image',
        'awa_published',
        'awa_headline',
        'awa_love_count',
        'created_at',
        'updated_at'
    ];
}
