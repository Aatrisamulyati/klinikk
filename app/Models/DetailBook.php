<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBook extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'booking_details';
    
    public function booking(){
        return $this-> belongsTo(Booking::class);
    }

    public function product(){
        return $this-> belongsTo(Product::class);
    }
}
