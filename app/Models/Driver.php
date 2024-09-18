<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table='drivers';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'nama_driver',
        'alamat_driver',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_telp',
        'tarif',
        'bahasa',
        'status'
       
        
        
    ];
}
