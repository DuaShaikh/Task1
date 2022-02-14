<?php

/**
 * Header Component Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Header Class extends component
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class Header extends Component
{
    // /**
    //  * Create a new component instance.
    //  *
    //  * @return void
    //  */
    // public $title = "";

    // public function __construct($componentName)
    // {
    //     //

    //     $this-> $title = $componentName;
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.Header');
    }
}
