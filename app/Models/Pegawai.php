<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table='pegawais';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'nama_pegawai',
        'alamat_pegawai',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_telp',
        'password',
        'foto',
        'id_jadwal',
        'role'
        
        
    ];
}
