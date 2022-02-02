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
    
    function getAdminProducts()
    {
        $products = $this->productService->getProducts();
        return view('admin.product', compact('products'));
    }

    function addAdminProducts(Request $req)
    {
        $products = $this->productService->addProducts($req);
        return view('admin.add-product-media', compact('products'));
    }

    function deleteAdminProducts($id)
    {
        $products = $this->productService->deleteProducts($id);
        return redirect('dashboard/product');
    }

    function showAdminProducts($id)
    {
        $products = $this->productService->showProductsbyId($id);
        return view('admin.show-product-detail', compact('products'));
    }

    function editAdminProducts(Request $req)
    {
        $products = $this->productService->editProductsbyId($req);
        return redirect('dashboard/product');
    }

    function viewAdminProducts($id)
    {
        $products = $this->productService->showProductsbyId($id);
        return view('admin.view-admin-product', compact('products'));
    }
}
