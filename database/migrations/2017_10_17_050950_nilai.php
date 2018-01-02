<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_nilai',11);
            $table->integer('user')->unsigned();
            $table->foreign('user')->references('id_user')->on('users');
            $table->integer('ujian')->unsigned();
            $table->foreign('ujian')->references('id_ujian')->on('ujian_online');
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
        //
    }
}
