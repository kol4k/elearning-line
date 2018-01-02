<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CatatanPoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_points', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_catatan',11);
            $table->integer('id_biodata')->unsigned();
            $table->foreign('id_biodata')->references('id_biodata')->on('biodatas');
            $table->integer('id_skors')->unsigned();
            $table->foreign('id_skors')->references('id_skors')->on('skors');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->text('catatan')->nullable();
            $table->string('point',20)->comment('Point Log');
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
        Schema::dropIfExists('catatan_point');
    }
}
