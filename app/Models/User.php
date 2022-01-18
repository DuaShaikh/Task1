<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function UserOrder(): HasOne
    {
        return $this->hasMany(Order::class, 'id', 'App\Models\Order');
    }

    protected $fillable = [
        'fullName',
        'email',
        'password',
        'gender',
        'phone'
    ];

    protected $guarded = ['token'];
}
