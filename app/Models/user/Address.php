<?php

namespace App\Models\user;

use App\Models\User;
use App\Models\shop\Order;
use App\Models\shop\Shipper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'city',
        'region',
        'country',
        'postalCode'
    ];

    protected $guarded = ['token'];



    /**
     * Get the user associated with the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userAddress(): HasOne
    {
        return $this->hasOne(User::class);
    }

    // public function shipperAddress(): HasOne
    // {
    //     return $this->hasOne(Shipper::class);
    // }

    // public function orderAddress(): HasOne
    // {
    //     return $this->hasOne(Order::class, 'id', 'order_id');
    // }
}
