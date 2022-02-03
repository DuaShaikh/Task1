<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;

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

    function addAdminCategories(CategoryRequest $req)
    {
        $categories = $this->categoryService->postCategories($req);
        return redirect('admin/dashboard/category');
    }

    function deleteAdminCategories($id)
    {
        $categories = $this->categoryService->deleteCategories($id);
        return redirect('admin/dashboard/category');
    }

    function showAdminCategories($id)
    {
        $category = $this->categoryService->showCategories($id);
        return view('admin.show-category-detail', compact('category'));
    }

    function editAdminCategories(Request $req)
    {
        $category = $this->categoryService->editCategoriesbyId($req);
        return redirect('admin/dashboard/category');
    }
}
