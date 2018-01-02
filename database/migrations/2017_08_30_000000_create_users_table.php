<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user',11);
            $table->integer('id_biodata')->unsigned();
            $table->foreign('id_biodata')->references('id_biodata')->on('biodatas')->nullable();
            $table->string('email',90)->unique();
            $table->string('password',251);
            $table->string('foto',251)->nullable();
            $table->string('jabatan',251)->default('Murid');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
