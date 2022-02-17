<?php

/**
 * Category Model Comment
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

use App\Models\Common\Media;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * This is Category Class extends Model
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryName',
        'media_id',
        'parent_id'
    ];

    protected $guarded = ['token'];


    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    /**
     * Get the categoryMedia associated with the Media
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoryMedia()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }

    /**
     * Get the Product associated with the Product from product category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

    /**
     * Get the parent associated with the self class parent id
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    /**
     * Get the childs associated with the self class parent id
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function childs()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
