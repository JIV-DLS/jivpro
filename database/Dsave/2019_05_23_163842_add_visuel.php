<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisuel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visuel', function (Blueprint $table) {
            $table->bigIncrements('visuel');
            $table->string('default')->nullable();
            $table->Integer('media')->unsigned();
            $table->foreign('media')->references('media')->on('media');
            $table->Integer('post')->unsigned();
            $table->foreign('post')->references('post')->on('post');
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
        Schema::dropIfExists('Visuel');
    }
}
