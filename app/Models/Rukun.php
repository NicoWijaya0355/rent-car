<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rukun extends Model
{
    protected $table='rukuns';
   protected $primaryKey='id';
   public $timestamps=true;
   protected $fillable=[
       'kepala_rukun',
       'RT',
       'jumlah_kartu',
       'jumlah_penduduk'
       
       
   ];
}
