<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Biodata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_biodata',11);
            $table->string('nama',90);
            $table->string('ttl',90);
            $table->text('alamat');
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->string('telephone',90);
            $table->string('foto',251)->nullable();
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
        Schema::dropIfExists('biodatas');
    }
}
