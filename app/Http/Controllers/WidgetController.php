<?php

/**
 * Widget Controller Doc Comment
 * 
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WidgetService;

    /**
     * This is WidgetController extends controller
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class WidgetController extends Controller
{
    protected $widgetService;

    /**
     * Define construct function.
     * 
     * @param object $widgetService connecting to widget service
     */
    function __construct(WidgetService $widgetService)
    {
        $this->widgetService = $widgetService;
    }

    /**
     * This is a getData function which get widget data from widget table
     * 
     * @return \Illuminate\View\View
     */
    function getData()
    {
        $widgets = $this->widgetService->getWidgets();

        return view('home', compact('widgets'));
    }
}
