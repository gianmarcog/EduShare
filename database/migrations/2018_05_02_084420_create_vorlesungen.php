<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVorlesungen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vorlesungen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('professor');
            $table->integer('ranking');
            $table->integer('hid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vorlesungen', function (Blueprint $table) {
            //
        });
    }
}
