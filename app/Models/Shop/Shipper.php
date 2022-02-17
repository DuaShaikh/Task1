<?php

/**
 * Shipper Model Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This is Shipper Class extends Model
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class Shipper extends Model
{
    use HasFactory;

    /**
     * Get the OrderShipper associated with the Shipper
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderShipper()
    {
        return $this->hasOne(Order::class, 'shipper_id', 'App\Models\Shipper');
    }
}
