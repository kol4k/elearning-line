<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UjianOnline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_online', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_ujian',11);
            $table->date('waktu_mulai');
            $table->date('waktu_selesai');
            $table->enum('status',['aktif','nonaktif']);
            $table->integer('materi')->unsigned();
            $table->foreign('materi')->references('id_materi')->on('materi');
            $table->integer('tipe')->unsigned();
            $table->foreign('tipe')->references('id_tipe')->on('tipe_ujian');
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
