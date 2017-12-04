<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReguPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regu_peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_regu');
            $table->string('username')->unique();
            $table->string('nama_regu');
            $table->string('nama_sekolah');
            $table->string('nama_anggota_regu');
            $table->string('nama_official_regu');
            $table->integer('status_konfirmasi')->default(0);
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
        Schema::dropIfExists('regu_peserta');
    }
}
