<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosseder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Temps', function (Blueprint $table) {
            $table->integer('NbHeure');
            $table->BigInteger('personnes')->unsigned();
            $table->foreign('personnes')->references('personnes')->on('personnes');
            $table->BigInteger('matieres')->unsigned();
            $table->foreign('matieres')->references('matieres')->on('matieres');
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
        Schema::dropIfExists('Temps');
    }
}
