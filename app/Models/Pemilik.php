<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    protected $table='pemiliks';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'nama_pemilik',
        'alamat_pemilik',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_telp',
        'password'

        
        
    ];
}
