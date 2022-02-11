<?php

/**
 * Category service Doc Comment
 * 
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Services;

use App\Models\common\Media;
use Illuminate\Http\Request;
use App\Models\shop\Category;
use Illuminate\Support\Facades\Storage;

    /**
     * This is a Category service class
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class CategoryService
{
    /**
     * Get all Categories from category table
     * 
     * @return Category
     */
    function getCategories()
    {
        return Category::with(['categoryMedia','product', 'parent.childs'])->get();
    }
    /**
     * Create categories and category media 
     * 
     * @param Illuminate\Http\Request $req 
     * 
     * @return Category
     */
    function postCategories($req)
    {
        $imageName = time() . '.' . $req->file('photo')->getClientOriginalName();
        $type = $req->file('photo')->getClientOriginalExtension();
        $url  = Storage::disk('public')->putFileAs(
            'category/',
            $req->file('photo'),
            $imageName
        );
        $req->merge(
            [
                "imageName" => $imageName,
                "imageType" => $type,
                "url" => $url
            ]
        );

        $media = Media::create($req->all());

        $req->merge(
            [
               'media_id' => $media->id,
            ]
        );

        return Category::create($req->all());
    }
    /**
     * Delete categories by id
     * 
     * @param $id passing category id
     * 
     * @return Category
     */
    function deleteCategories($id)
    {
        return Category::find($id)->delete();
    }
    /**
     * Show category media detail and categories detail by id
     * 
     * @param $id passing category id
     * 
     * @return Category
     */
    function showCategories($id)
    {
        return Category::find($id);
    }
    /**
     * Get categories where parent id is null
     * 
     * @return Category
     */
    function showNullCategory()
    {
        return Category::whereNull('parent_id')
            ->with(['categoryMedia', 'product', 'parent.childs'])->get();
    }
    /**
     * Edit category media and categories by id
     * 
     * @param Illuminate\Http\Request $req 
     * 
     * @return Category
     */
    function editCategoriesbyId($req)
    {
        $imageName = time() . '.' . $req->file('photo')->getClientOriginalName();
        $type = $req->file('photo')->getClientOriginalExtension();
        $url  = Storage::disk('public')->putFileAs(
            'category/',
            $req->file('photo'),
            $imageName
        );
        $req->merge(
            [
                "imageName" => $imageName,
                "imageType" => $type,
                "url" => $url
            ]
        );
        $media = Media::find($req->media_id);
        $media->update($req->all());

        $category = Category::find($req->id);
        $category->update($req->all());

        return $category;
    }
}
