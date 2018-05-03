<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class CreateAsmitProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asmit_project', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('awp_author_id', false, false);
            $table->string('awp_slug', 225);
            $table->string('awp_category', 225);
            $table->text('awp_tags');
            $table->string('awp_title', 225);
            $table->text('awp_description');
            $table->string('awp_headline', 20);
            $table->string('awp_status', 20);
            $table->string('awp_link_android', 100)->nullable();
            $table->string('awp_link_osx', 100)->nullable();
            $table->string('awp_link_web', 100)->nullable();
            $table->string('awp_link_web_demo', 100)->nullable();
            $table->string('awp_link_github', 100)->nullable();
            $table->string('awp_link_guide', 100)->nullable();
            $table->string('awp_logo', 50);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Artisan::call('db:seed', [
            '--class' => AsmitProjectTableSeed::class,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('asmit_project');
    }
}
