<?php

/**
 * Product Model Comment
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

use App\Models\common\Media;
use App\Models\shop\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is Product Class extends Model
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
       'pName',
       'description',
       'productPrice',
       'media_id',
    ];

    protected $guarded = ['token'];


    /**
     * Get the productMedia associated with the Meida
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function productMedia()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    /**
     * Get the product category associated with the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }
}
