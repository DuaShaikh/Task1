<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    public function ProductManufacturer(): HasOne
    {
        return $this->hasMany(Product::class, 'manufacturer_id', 'App\Models\Products');
    }
    
}
