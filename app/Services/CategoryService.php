<?php

namespace App\Services;
use App\Models\common\Media;
use Illuminate\Http\Request;
use App\Models\shop\Category;
use Illuminate\Support\Facades\Storage;

class CategoryService
{

    function getCategories() 
    {
        return Category::with('categoryMedia')->get();
       
    }
    
    function postCategories($req)
    { 
        $imageName = time() . '.' . $req->file('photo')->getClientOriginalName();
        $type = $req->file('photo')->getClientOriginalExtension();
        $url  = Storage::disk('public')->putFileAs(
            'category/', $req->file('photo'), $imageName
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
               'media_id' =>$media->id,
            ]
        );  
        return Category::create($req->all());
    }

    function deleteCategories($id)
    {
        return Category::find($id)->delete();
    }

    function showCategories($id)
    {
        return Category::find($id);
    }

    function showNullCategory()
    {
        return Category::whereNull('parent_id')->with('categoryMedia')->get();
    }

    function editCategoriesbyId($req)
    {
        $imageName = time() . '.' . $req->file('photo')->getClientOriginalName();
        $type = $req->file('photo')->getClientOriginalExtension();
        $url  = Storage::disk('public')->putFileAs(
            'category/', $req->file('photo'), $imageName
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