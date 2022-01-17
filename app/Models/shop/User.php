<?php

namespace App\Models\shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function UserOrder(): HasOne
    {
        return $this->hasMany(Order::class, 'user_id', 'App\Models\Order');
    }
}
