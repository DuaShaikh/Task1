<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WidgetService;

class WidgetController extends Controller
{
    protected $widgetService;

    function __construct(WidgetService $widgetService)
    {
        $this->widgetService = $widgetService;
    }

    //
    function getData()
    {
        $widgets = $this->widgetService->getWidgets();

        return view('home', compact('widgets'));
    }
}
