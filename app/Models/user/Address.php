<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * Get the user associated with the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function UserAddress(): HasOne
    {
        return $this->hasOne(User::class, 'address_id', 'App\Models\User');
    }

    public function ShipperAddress(): HasOne
    {
        return $this->hasOne(Shipper::class, 'address_id', 'App\Models\Shipper');
    }

    public function OrderAddress(): HasOne
    {
        return $this->hasOne(Order::class, 'address_id', 'App\Models\Order');
    }

}
