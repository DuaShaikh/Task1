<?php

namespace App\Models\shop;

use App\Models\User;
use App\Models\shop\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    /**
     * Get the cartProduct associated with the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function CartProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function CartUser()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    protected $fillable = [
        'product_id',
        'quantity',
        'user_id',
        'size',
    ];

    protected $guarded = ['token'];
}
