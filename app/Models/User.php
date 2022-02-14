<?php

/**
 * User Model Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Models;

use App\Models\shop\Cart;
use App\Models\shop\Order;
use App\Models\user\Address;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * This is User Class extends Model
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
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


    /**
     * Get the user order associated with the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userOrder()
    {
        return $this->hasMany(Order::class, 'id', 'App\Models\shop\Order');
    }


    /**
     * Get the user cart associated with the Cart items
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get the user order associated with the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the user address associated with the Address
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userAddress()
    {
        return $this->hasOne(Address::class, 'id', 'address_id');
    }
}
