<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('login', 50);
            $table->string('password', 50);
            $table->string('email', 150);
            $table->enum('role',['user','admin'])->default('user');
            $table->string('profile_foto', 150)->nullable()->default(NULL);
            $table->enum('ban',['ban','not_ban'])->default('not_ban');
        });
    }

    # механизмы для создания таблиц
    //https://laravel.ru/docs/v5/schema

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
