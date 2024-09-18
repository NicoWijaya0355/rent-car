<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'nama_customer',
        'alamat_customer',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'no_telp',
        'password',
        'status_data'
        
        
    ];

}
