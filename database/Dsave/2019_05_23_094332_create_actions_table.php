<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->BigInteger('t_action')->unsigned();
            $table->foreign('t_action')->references('t_actions')->on('t_actions');
            $table->BigInteger('matiere')->unsigned();
            $table->foreign('matiere')->references('matieres')->on('matieres');
            $table->BigInteger('personne')->unsigned();
            $table->foreign('personne')->references('personnes')->on('personnes');
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
        Schema::dropIfExists('actions');
    }
}
