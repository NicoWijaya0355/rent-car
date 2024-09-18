<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table='ratings';
    protected $primaryKey='id';
    public $timestamps=true;
    protected $fillable=[
        'driver_id',
        'rating',
        'rata'
    ];

    public function driver(){
        return $this->belongsTo('App\Models\driver');
    }
}
