<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_customer');
            $table->string('no_ktp');       
            $table->string('no_sim')->nullable();
            $table->date('tanggal_transaksi');
            $table->dateTime('tanggal_waktu_mulai_sewa');
            $table->dateTime('tanggal_waktu_selesai_sewa');
            $table->unsignedBigInteger('mobil_id');
            $table->foreign('mobil_id')->references('id')->on('mobils');
            $table->string('no_plat_mobil');
            $table->float('harga_sewa_perhari');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->string('no_telp_driver')->nullable();
            $table->float('tarif_driver')->nullable();
            $table->string('metode_pembayaran');
            $table->float('jumlah_pembayaran')->default(0);
            $table->string('verifikasi_dokumen')->default('belum verifikasi');
            $table->string('status_transaksi')->default('belum bayar');
            $table->string('jenis_transaksi')->default('rental mobil');
            $table->float('rating_driver')->nullable();
            $table->dateTime('pengembalian_mobil')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
