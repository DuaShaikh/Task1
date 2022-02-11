<?php

/**
 * Widget service Doc Comment
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

use App\Models\Widget;
use Illuminate\Http\Request;

    /**
     * This is a Widget service class
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class WidgetService
{
    /**
     * Get widget data from widget table
     * 
     * @return Widget
     */
    function getWidgets()
    {
        return Widget::get();
    }
}
