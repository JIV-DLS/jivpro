<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('post');
            $table->string('title')->nullable();
            $table->text('desct')->nullable();
            $table->text('active')->nullable();
            $table->text('slide')->nullable();
            $table->BigInteger('idPers')->unsigned();
            $table->foreign('idPers')->references('personnes')->on('personnes');
            $table->Integer('idCat')->unsigned();
            $table->foreign('idCat')->references('categorie')->on('categorie');
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
        Schema::dropIfExists('post');
    }
}
