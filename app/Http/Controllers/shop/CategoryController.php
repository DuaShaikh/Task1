<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    function __construct(CategoryService $categoryService)
    {
        return $this->categoryService =$categoryService;
    }

    function getAdmincategories()
    {
        $categories = $this->categoryService->getCategories();
        return view('admin.category', compact('categories'));
    }

    function addAdminCategories(Request $req)
    {
        $categories = $this->categoryService->postCategories($req);
        return redirect('dashboard/category');
    }

    function deleteAdminCategories($id)
    {
        $categories = $this->categoryService->deleteCategories($id);
        return redirect('dashboard/category');
    }

    function showAdminCategories($id)
    {
        $category = $this->categoryService->showCategories($id);
        return view('admin.show-category-detail', compact('category'));
    }

    function editAdminCategories(Request $req)
    {
        $category = $this->categoryService->editCategoriesbyId($req);
        return redirect('dashboard/category');
    }
}
