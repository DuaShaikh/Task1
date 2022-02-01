<?php

namespace App\Models;

use App\Models\shop\Cart;
use App\Models\shop\Order;
use App\Models\user\Address;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'fullName',
        'email',
        'password',
        'gender',
        'phone',
        'address_id',
        'media_id'
    ];

    protected $guarded = ['token'];

    public function userOrder()
    {
        return $this->hasMany(Order::class, 'id', 'App\Models\shop\Order');
    }

    public function cart(): mixed
    {
        return $this->hasMany(Cart::class);
    }

    public function order(): mixed
    {
        return $this->hasMany(Order::class);
    }
    
    public function userAddress()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
}
