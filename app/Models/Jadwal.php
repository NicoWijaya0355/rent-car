<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table='jadwals';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'hari',
        'jam_awal',
        'jam_akhir'
        
       
    ];
}
