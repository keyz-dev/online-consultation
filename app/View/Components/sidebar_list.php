<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebar_list extends Component
{
    public $title;
    public $route;
    public $svg;
    public function __construct($route, $title, $svg=null)
    {
        $this->route = $route;
        $this->title = $title;
        $this->svg = $svg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar_list');
    }
}
