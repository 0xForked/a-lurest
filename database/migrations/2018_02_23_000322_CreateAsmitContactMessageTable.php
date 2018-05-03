<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

class CreateAsmitContactMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asmit_message', function (Blueprint $table) {
            $table->increments('id');
            $table->string('awm_sender_name', 50);
            $table->string('awm_sender_email', 50);
            $table->string('awm_message_title', 225);
            $table->text('awm_message_body');
            $table->string('awm_message_status', 15);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });

        Artisan::call('db:seed', [
            '--class' => AsmitMessageTableSeed::class,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asmit_message');
    }
}
