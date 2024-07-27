<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pasien extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded=[];

    public function booking(){
        return $this-> hasMany(Booking::class, 'pasien_id');
    }

    public function transaksi()
    {
    	return $this->hasMany(Transaksi::class, 'pasien_id');
    }
}
