<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\StockService;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StockRequest;

class StockController extends Controller
{
    protected $stockService;
    protected $productService;

    function __construct(StockService $stockService, ProductService $productService)
    {
        $this->stockService = $stockService;
        $this->productService = $productService;
    }
    function addStocks(Request $req)
    {
        $product = $this->productService->getLastProductId();
        // $insertedId = $product->id;
        $stock = $this->stockService->addProductStock($req);
        session()->flash('product', 'Product Stock Added successfully!');
        return view('admin.product-stock', compact('product'));
    }
}
