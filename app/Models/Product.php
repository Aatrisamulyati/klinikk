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

    public function masuk()
    {
        return $this->hasMany(Masuk::class);
    }

    public function keluar()
    {
        return $this->hasMany(Keluar::class);
    }
    
}
