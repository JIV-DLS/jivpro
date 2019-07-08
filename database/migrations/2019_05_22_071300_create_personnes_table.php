<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->bigIncrements('personnes');
            $table->string('Nom');
            $table->string('Prenom');
            $table->Date('DateNaiss');
            $table->BigInteger('tpersonne')->unsigned();
            $table->foreign('tpersonne')->references('t_personnes')->on('t_personnes');
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
        Schema::dropIfExists('personnes');
    }
}
