<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

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
