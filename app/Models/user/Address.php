<?php

namespace App\Models\user;

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
        return $this->hasOne(User::class, 'id', 'App\Models\user\User');
    }

    public function shipperAddress(): HasOne
    {
        return $this->hasOne(Shipper::class, 'id', 'App\Models\shop\Shipper');
    }

    public function orderAddress(): HasOne
    {
        return $this->hasOne(Order::class, 'id', 'App\Models\shop\Order');
    }

}
