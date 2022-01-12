<?php

namespace App\Services;
use App\Models\Widget;
use Illuminate\Http\Request;

class WidgetService
{    //
    function getWidgets(){
        return Widget::get();
    }
    
    
}
