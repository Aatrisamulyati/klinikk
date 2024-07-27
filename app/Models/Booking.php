<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public function pasien(){
        return $this-> belongsTo(User::class, 'pasien_id');
    }

    public function dokter(){
        return $this-> belongsTo(User::class, 'dokter_id');
    }

    public function service(){
        return $this-> belongsTo(Service::class, 'service_id');
    }

}   
