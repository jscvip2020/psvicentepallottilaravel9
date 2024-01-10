<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class FrontLayout extends Component
{
    public function __construct()
    {
    }

    /**
     * Get the view / contentes that represents the componet.
     *
     * @author Jose Sergio Cordeiro <jscvip@gmail.com>
     *
     * @return \Illuminate\View\View
     */
    public function render(): View
    {
        return view('layouts.front');
    }
}
