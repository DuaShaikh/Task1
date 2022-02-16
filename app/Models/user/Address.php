<?php

/**
 * Address Model Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Models\user;

use App\Models\User;
use App\Models\shop\Order;
use App\Models\shop\Shipper;
use Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is Address Class extends Model
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
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
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return AddressFactory::new();
    }

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
