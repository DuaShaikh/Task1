<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\MediaService;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $mediaService;

    function __construct(CategoryService $categoryService, MediaService $mediaService)
    {
        return $this->categoryService = $categoryService;
        return $this->mediaService = $mediaService;
    }

    function getAdmincategories()
    {

        $categories = $this->categoryService->getCategories();

        return view('admin.category', compact('categories'));
    }

    function showAdminSubCategory()
    {
        $cate = $this->categoryService->showNullCategory();

        return view('admin.add-category', compact('cate'));
    }
    function addAdminCategories(CategoryRequest $req)
    {
        $categories = $this->categoryService->postCategories($req);
        session()->flash('status', 'Category Added successfully!');

        return redirect('admin/dashboard/category');
    }

    function deleteAdminCategories($id)
    {
        $categories = $this->categoryService->deleteCategories($id);
        session()->flash('status', 'Category Deleted successfully!');

        return redirect('admin/dashboard/category');
    }

    function showAdminCategories($id)
    {
        $cate = $this->categoryService-> showNullCategory();
        $category = $this->categoryService->showCategories($id);

        return view('admin.show-category-detail', compact('category', 'cate'));
    }

    function editAdminCategories(CategoryRequest $req)
    {
        // $media = $this->mediaService->editCategoryMedia($req);
        $category = $this->categoryService->editCategoriesbyId($req);
        session()->flash('status', 'Category Updated successfully!');

        return redirect('admin/dashboard/category');
    }
}
