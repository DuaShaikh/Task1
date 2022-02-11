<?php

/**
 * Category Controller Doc Comment
 * 
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\MediaService;

    /**
     * This is CategoryController extends controller
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class CategoryController extends Controller
{
    protected $categoryService;
    protected $mediaService;

    /**
     * Define construct function.
     * 
     * @param object $categoryService connecting to category service
     * @param object $mediaService    connecting to media service
     */
    function __construct(
        CategoryService $categoryService,
        MediaService $mediaService
    ) {
        return $this->categoryService = $categoryService;
        return $this->mediaService = $mediaService;
    }

    /**
     * This is a getAdmincategories function which get 
     * categories from category table 
     * 
     * @return \Illuminate\View\View
     */
    function getAdmincategories()
    {
        $categories = $this->categoryService->getCategories();

        return view('admin.category', compact('categories'));
    }

    /**
     * This is a showAdminSubCategory function which show 
     * sub categories from category table 
     * 
     * @return \Illuminate\View\View
     */
    function showAdminSubCategory()
    {
        $cate = $this->categoryService->showNullCategory();

        return view('admin.add-category', compact('cate'));
    }

    /**
     * This is a addAdminCategories function which add categories into category table
     * 
     * @param CategoryRequest $req passing category validation to category form
     * 
     * @return \Illuminate\View\View
     */
    function addAdminCategories(CategoryRequest $req)
    {
        $categories = $this->categoryService->postCategories($req);
        session()->flash('status', 'Category Added successfully!');

        return redirect('admin/dashboard/category');
    }

    /**
     * This is a deleteAdminCategories function 
     * which delete categories by id from category table
     * 
     * @param $id passing category_id
     * 
     * @return \Illuminate\View\View
     */
    function deleteAdminCategories($id)
    {
        $categories = $this->categoryService->deleteCategories($id);
        session()->flash('status', 'Category Deleted successfully!');

        return redirect('admin/dashboard/category');
    }

    /**
     * This is a showAdminCategories function 
     * which show categories by id from category table
     * 
     * @param $id passing category_id
     * 
     * @return \Illuminate\View\View 
     */    
    function showAdminCategories($id)
    {
        $cate = $this->categoryService-> showNullCategory();
        $category = $this->categoryService->showCategories($id);

        return view('admin.show-category-detail', compact('category', 'cate'));
    }

    /**
     * This is a editAdminCategories function 
     * which edit required categories from category table
     * 
     * @param \App\Http\Requests\Admin\CategoryRequest $req passing validation 
     * 
     * @return \Illuminate\View\View
     */ 
    function editAdminCategories(CategoryRequest $req)
    {
        // $media = $this->mediaService->editCategoryMedia($req);
        $category = $this->categoryService->editCategoriesbyId($req);
        session()->flash('status', 'Category Updated successfully!');

        return redirect('admin/dashboard/category');
    }
}
