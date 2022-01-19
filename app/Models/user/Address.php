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
        return $this->hasOne(User::class, 'id', 'App\Models\user\User');
    }

    public function ShipperAddress(): HasOne
    {
        return $this->hasOne(Shipper::class, 'id', 'App\Models\shop\Shipper');
    }

    public function OrderAddress(): HasOne
    {
        return $this->hasOne(Order::class, 'id', 'App\Models\shop\Order');
    }

    protected $fillable = [
        'address',
        'city',
        'region',
        'country',
        'postalCode'
    ];

    protected $guarded = ['token'];
}
