<?php

namespace App\Models\shop;

use App\Models\common\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = [
        'categoryName',
        'media_id'
    ];

    protected $guarded = ['token'];
    use HasFactory;

    public function categoryMedia()
    {
        return $this->hasOne(Media::class, 'id', 'media_id');
    }
}
