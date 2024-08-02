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

    public function product(){
        return $this-> belongsTo(Product::class, 'product_id');
    }
    
    public function detailbook(){
        return $this-> belongsTo(DetailBoook::class);
    }

    public function getTotal()
    {
        $servicePrice = $this->service ? $this->service->price : 0;
        $productPrice = $this->product ? $this->product->price : 0;

        return $servicePrice + $productPrice;
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

}   
