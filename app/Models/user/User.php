<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function UserOrder(): HasOne
    {
        return $this->hasMany(Order::class, 'id', 'App\Models\shop\Order');
    }

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
}
