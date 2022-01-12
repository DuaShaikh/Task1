<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deferral extends Model
{
    use HasFactory;

    protected $filable = [
        'name',
        'description',
        'interval',
        'count',
        'compute',
        'override',
        'confidential',
        'lookback',
        'deferralType'
    ];

    protected $guarded = [
        '_token'
    ];
}