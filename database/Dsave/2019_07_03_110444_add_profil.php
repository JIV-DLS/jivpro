<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Profil', function (Blueprint $table) {
            $table->bigIncrements('profil');
            $table->Integer('media')->unsigned();
            $table->foreign('media')->references('media')->on('media');
            $table->BigInteger('users')->unsigned();
            $table->foreign('users')->references('users')->on('users');
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
        Schema::dropIfExists('Profil');
    }
}
