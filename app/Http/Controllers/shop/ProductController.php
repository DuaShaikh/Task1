<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductService;


class ProductController extends Controller
{
    protected $productService;

    function __construct(productService $productService) {
        $this->productService = $productService;
    }
    function getProduct() 
    {
        $products = $this->productService->getProducts();
        return view('welcome', compact('products'));
    }
}
