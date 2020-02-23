<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('name_fish', 50);
            $table->text('description');
            $table->string('foto_fish')->nullable();
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
        Schema::dropIfExists('fish');
    }
}
