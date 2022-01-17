<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    /**
     * Get the cartProduct associated with the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cartProduct(): HasOne
    {
        return $this->hasOne(Product::class, 'cart_id', 'App\Models\Product');
    }
}
