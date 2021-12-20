<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table='data_penduduk';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'nama_depan',
        'nama_belakang',
        'RT',
        'RW',
        'no_telp',
        'tempat_lahir',
        'tanggal_lahir'
        
    ];
}
