<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartu extends Model
{
    protected $table='kartus';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'kepala_keluarga',
        'RT',
        'RW',
        'jumlah'
        
        
    ];
}
