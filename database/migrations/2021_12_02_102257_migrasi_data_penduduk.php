<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MigrasiDataPenduduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_penduduk', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->integer('RT');
            $table->integer('RW');
            $table->string('no_telp');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_penduduk');
    }
}
