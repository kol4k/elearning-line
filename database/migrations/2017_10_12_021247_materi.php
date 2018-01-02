<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Materi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_materi',11);
            $table->string('nama',255);
            $table->text('tentang');
            $table->integer('rank_class')->unsigned();
            $table->foreign('rank_class')->references('id_rank')->on('rank_class');
            $table->integer('pelajaran')->unsigned();
            $table->foreign('pelajaran')->references('id_pelajaran')->on('pelajaran');
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
