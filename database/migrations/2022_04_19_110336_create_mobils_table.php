<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_mobil');
            $table->string('tipe_mobil');       
            $table->string('jenis_transmisi');
            $table->string('jenis_bahan_bakar');
            $table->string('warna_mobil');
            $table->string('volume_bagasi')->default('-');
            $table->string('fasilitas');
            $table->float('harga_sewa');
            $table->integer('kapasitas');
            $table->string('plat_nomor');
            $table->string('no_stnk');
            $table->string('kategori_aset');
            $table->date('tanggal_terakhir_servis');
            $table->string('status_mobil')->default('tersedia');
            $table->date('tanggal_mulai_kontrak');
            $table->date('tanggal_akhir_kontrak');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mobils');
    }
}
