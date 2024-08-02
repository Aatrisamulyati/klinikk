<?php

namespace App\Models;

use App\Models\Masuk;
use App\Models\Keluar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    public function booking(){
        return $this-> belongsTo(Booking::class);
    }
    
    public function detailbook(){
        return $this-> belongsTo(DetailBoook::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    
}
