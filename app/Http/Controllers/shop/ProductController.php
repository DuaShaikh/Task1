<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\StockService;
use App\Services\ProductService;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    protected $productService;
    protected $stockService;

    function __construct(ProductService $productService, StockService $stockService) {
        $this->productService = $productService;
        $this->stockService = $stockService;
    }
    function getProduct() 
    {
        $products = $this->productService->getProducts();
        return view('welcome', compact('products'));
    }
    function getProductByid($id) 
    {
        $products = $this->productService->getProductsbyId($id);
        $stocks = $this->stockService->getStockAvailable($products);
        return view('shop.view-product', compact('products', 'stocks'));
    }
    
}
