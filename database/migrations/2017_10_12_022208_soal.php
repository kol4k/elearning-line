<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Soal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_soal',11);
            $table->text('soal');
            $table->string('gambar_soal',251)->nullable();
            $table->text('a');
            $table->text('b');
            $table->text('c');
            $table->text('d');
            $table->text('e');
            $table->integer('materi')->unsigned();
            $table->foreign('materi')->references('id_materi')->on('materi');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id_user')->on('users');
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
