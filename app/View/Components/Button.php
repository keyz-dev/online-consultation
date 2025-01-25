<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $class;
    public $text;
    public $icon;



    public function __construct(
        $type='button',
        $class= null,
        $text = null,
        $icon = null,
    )
    {
        $this->type = $type;
        $this->class = $class;
        $this->text = $text;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
