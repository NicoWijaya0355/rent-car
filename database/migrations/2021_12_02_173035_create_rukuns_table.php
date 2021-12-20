<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRukunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rukuns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kepala_rukun');
            $table->integer('RT');       
            $table->integer('jumlah_kartu');
            $table->integer('jumlah_penduduk');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rukuns');
    }
}
