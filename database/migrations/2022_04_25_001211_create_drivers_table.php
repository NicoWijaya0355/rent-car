<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_driver');
            $table->string('alamat_driver');       
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('email')->nullable();
            $table->string('no_telp')->nullable();
            $table->float('tarif')->nullable();
            $table->string('bahasa');
            $table->string('status')->default('tersedia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
