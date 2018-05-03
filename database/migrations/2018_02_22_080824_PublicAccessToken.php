<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PublicAccessToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_access', function (Blueprint $table) {
            $table->increments('id');
            $table->string('access_id', 255)->unique();
            $table->string('access_token', 255)->unique();
            $table->string('access_email', 50)->unique();
            $table->ipAddress('ip_address');
            $table->integer('group_id')->index()->unsigned();
            $table->unsignedTinyInteger('access_status');
            $table->unsignedInteger('access_periode');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('public_access');
    }
}
