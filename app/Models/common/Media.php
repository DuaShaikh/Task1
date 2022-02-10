<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'imageName',
        'imageType'
    ];

    protected $guarded = ['token'];
}
