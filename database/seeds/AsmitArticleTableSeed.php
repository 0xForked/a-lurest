<?php

use Illuminate\Database\Seeder;

class AsmitArticleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asmit_article')->insert([
            [
                'awa_author_id' => 445,
                'awa_category' => '1, 2, 3',
                'awa_tags' => 'this firts article, article, asmit blog',
                'awa_slug' => 'the-first-article',
                'awa_title' => 'The firts article',
                'awa_content' => 'This is my first article in this blog',
                'awa_image' => 'first_article.png',
                'awa_published' => 'isPublished',
                'awa_headline' => 'isArticle',
                'awa_love_count' => 999
            ],

        ]);
    }
}
