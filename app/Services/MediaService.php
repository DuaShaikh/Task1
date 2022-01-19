<?php

namespace App\Services;
use App\Models\common\Media;
use Illuminate\Http\Request;

class MediaService
{

    function userMedia($request) 
    {
        
         $request->file('photo')->store('public/users/');

        return Media::create($request->all());
    }
    // $imageName = $request->file('photo')->getClientOriginalName();
        // // $imageType = $request->file('photo')->getClientOriginalExtension();
        // $request->file('photo')->storeAs('public/users/', $imageName);

        // $media = new Media();
        // $media->imageName = $imageName;
        // $media->imageType = $imageType;
        // $media->save();
}