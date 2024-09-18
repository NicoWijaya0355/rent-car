<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table='mobils';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'nama_mobil',
        'tipe_mobil',
        'jenis_transmisi',
        'jenis_bahan_bakar',
        'warna_mobil',
        'volume_bagasi',
        'fasilitas',
        'harga_sewa',
        'kapasitas',
        'plat_nomor',
        'no_stnk',
        'kategori_aset',
        'tanggal_terakhir_servis',
        'status_mobil',
        'tanggal_mulai_kontrak',
        'tanggal_akhir_kontrak'
        
        
    ];
}
