<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAktivitaeten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aktivitaeten', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('standort');
            $table->integer('ranking');
            $table->string('text',1000);
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
        Schema::table('aktivitaeten', function (Blueprint $table) {
            //
        });
    }
}
