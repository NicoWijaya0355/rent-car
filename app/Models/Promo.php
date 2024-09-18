<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table='promos';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'kode',
        'jenis_promo',
        'keterangan',
        'potongan'
        
       
    ];
}
