<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\StockService;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\MediaService;

class ProductController extends Controller
{
    protected $productService;
    protected $stockService;
    protected $categoryService;
    protected $mediaService;

    function __construct(
        ProductService $productService,
        StockService $stockService,
        CategoryService $categoryService,
        MediaService $mediaService
    ) {
        $this->productService = $productService;
        $this->stockService = $stockService;
        $this->mediaService = $mediaService;
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
        $media = $this->mediaService->productMedia($req);
        $id = $media->id;

        $products = $this->productService->addProducts($req, $id);

        $product = $products->id;
        // session()->flash('status', 'Product Added successfully!');
        return view('admin.product-stock', compact('product'));
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
        $media = $this->mediaService->editProductMedia($req);
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
