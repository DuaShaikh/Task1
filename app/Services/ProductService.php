<?php

namespace App\Services;
use App\Models\shop\Product;
use Illuminate\Http\Request;

class ProductService
{

    function getProducts() 
    {
        $products = Product::with(['productMedia'])
            ->get();

        return $products;
    }

    function getProductsbyId($id)
    {
        $products = Product::where('id', $id)
                    ->with(['productMedia']);
        return $products->get();
    }

}

