<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    public $label;
    public $rows;
    public $cols;
    public $name;
    public $placeholder;
    public $class;
    public $id;
    public $value;


    public function __construct(
        $label = null,
        $rows = "10",
        $cols = "30",
        $name,
        $placeholder = null,
        $class = '',
        $id = null,
        $value = null
    )
    {
        $this->label = $label;
        $this->rows = $rows;
        $this->cols = $cols;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->class = $class;
        $this->id = $id ?? $name;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-area');
    }
}
