<?php

namespace App\Models\shop;

use App\Models\shop\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_id',
        'quantity',
        'size',
    ];

    protected $guarded = ['token'];
   

    function updateStock()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
