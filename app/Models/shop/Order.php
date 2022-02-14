<?php

/**
 * Order Model Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Models\shop;

use App\Models\User;
use App\Models\shop\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is Order Class extends Model
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    protected $guarded = ['token'];


    /**
     * Get the user order associated with the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userOrder()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get the items associated with the order item
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
