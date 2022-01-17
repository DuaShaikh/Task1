<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    use HasFactory;

    /**
     * Get the OrderShipper associated with the Shipper
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function OrderShipper(): HasOne
    {
        return $this->hasOne(Order::class, 'shipper_id', 'App\Models\Shipper');
    }
}
