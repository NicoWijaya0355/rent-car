<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table='transaksis';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'nama_customer',
        'no_ktp',
        'no_sim',
        'tanggal_transaksi',
        'tanggal_waktu_mulai_sewa',
        'tanggal_waktu_selesai_sewa',
        'mobil_id',
        'no_plat_mobil',
        'harga_sewa_perhari',
        'driver_id',
        'no_telp_driver',
        'tarif_driver',
        'metode_pembayaran',
        'jumlah_pembayaran',
        'verifikasi_dokumen',
        'status_transaksi',
        'jenis_transaksi',
        'rating_driver',
        'pengembalian_mobil'
    ];

    public function mobil(){
        return $this->belongsTo('App\Models\Mobil');
    }

    public function driver(){
        return $this->belongsTo('App\Models\driver');
    }
}
