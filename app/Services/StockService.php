<?php

namespace App\Services;
use App\Models\shop\Stock;
use Illuminate\Http\Request;

class StockService
{

    function stockUpdate($id, $size) 
    {
        return Stock::where(['product_id'=>$id, 'size'=>$size]);
    }
}