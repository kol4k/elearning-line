<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Skors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('skors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_skors',11);
            $table->string('jenis',250);
            $table->string('kode',90)->unique()->nullable();
            $table->text('keterangan');
            $table->integer('ps')->default(0);
            $table->integer('sp')->default(0);
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
        Schema::dropIfExists('skors');
    }
}
