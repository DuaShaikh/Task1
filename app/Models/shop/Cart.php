<?php

/**
 * Cart Model Comment
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
use App\Models\shop\Stock;
use App\Models\shop\Product;
use Database\Factories\CartFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is Cart Class extends Model
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'user_id',
        // 'stock_id',
        'size',
    ];

    protected $guarded = ['token'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CartFactory::new();
    }

    /**
     * Get the cartProduct associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cartProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Get the cartUser associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cartUser()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * Get the cartStock associated with the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cartStock()
    {
        return $this->hasOne(Stock::class, 'id', 'stock_id');
    }
}
