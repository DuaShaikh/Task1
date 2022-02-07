<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\StockService;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{
    protected $productService;
    protected $stockService;
    protected $categoryService;

    function __construct(ProductService $productService, StockService $stockService, CategoryService $categoryService) {
        $this->productService = $productService;
        $this->stockService = $stockService;
        $this->categoryService = $categoryService;
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

    function showAdminCategory()
    {
        $category = $this->categoryService->getCategories();
        return view('admin.add-products', compact('category'));
    }
    function addAdminProducts(ProductRequest $req)
    {
        $products = $this->productService->addProducts($req);
        session()->flash('status', 'Product Added successfully!');
        
        return redirect('admin/dashboard/product');
    }

    function deleteAdminProducts($id)
    {
        $products = $this->productService->deleteProducts($id);
        session()->flash('status', 'Product Deleted successfully!');
        return redirect('admin/dashboard/product');
    }

    function showAdminProducts($id)
    {
        $category = $this->categoryService->getCategories();
        $products = $this->productService->showProductsbyId($id);
        $categories =  $products->category()->get()->pluck('id')->toArray();
        // ddd($categories);
        return view('admin.show-product-detail', compact('products', 'category', 'categories'));
    }

    function editAdminProducts(ProductRequest $req)
    {
        $products = $this->productService->editProductsbyId($req);
        session()->flash('status', 'Product Updated successfully!');
        return redirect('admin/dashboard/product');
    }

    function viewAdminProducts($id)
    {
        $products = $this->productService->showProductsbyId($id);
        return view('admin.view-admin-product', compact('products'));
    }
}
