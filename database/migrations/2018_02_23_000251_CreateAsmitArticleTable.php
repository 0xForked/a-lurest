<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class CreateAsmitArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asmit_article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('awa_author_id', false, false);
            $table->string('awa_category', 225);
            $table->text('awa_tags');
            $table->string('awa_slug', 225);
            $table->string('awa_title', 225);
            $table->longText('awa_content');
            $table->string('awa_image', 225);
            $table->string('awa_published', 20);
            $table->string('awa_headline', 20);
            $table->integer('awa_love_count', false, false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Artisan::call('db:seed', [
            '--class' => AsmitArticleTableSeed::class,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asmit_article');
    }
}
