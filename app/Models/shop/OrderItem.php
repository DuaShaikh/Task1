<?php

/**
 * OrderItem Model Comment
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

use App\Models\shop\Product;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\OrderItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is OrderItem Class extends Model
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'quantity',
        'productPrice',
        'product_id',
    ];

    // protected $table = 'order__items';

    protected $guarded = ['token'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return OrderItemFactory::new();
    }

    /**
     * Get the orderProduct associated with the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Get the order items associated with the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orders()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
