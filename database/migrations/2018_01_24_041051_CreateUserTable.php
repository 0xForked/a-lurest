<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id')->unique();
            $table->string('unique_token')->unique();
            $table->string('username', 50)->unique()->nullable();
            $table->string('phone', 50);
            $table->string('email', 50);
            $table->string('password');
            $table->string('activation_code', 50)->nullable();
            $table->string('forgotten_password_code', 50)->nullable();
            $table->unsignedInteger('forgotten_password_time')->nullable();
            $table->string('remember_code', 50)->nullable();
            $table->unsignedTinyInteger('status_acc');
            $table->timestamp('last_login')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }
}
