<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    public function booking(){
        return $this-> hasMany(Booking::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Booking::class, 'dokter_id');
    }

}
