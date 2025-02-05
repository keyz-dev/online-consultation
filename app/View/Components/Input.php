<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $label_styles;
    public $value;
    public $name;
    public $placeholder;
    public $type;
    public $class;
    public $id;
    public $disabled;
    public $icon;
    public function __construct(
        $type = 'text',
        $name,
        $id = null,
        $label = null,
        $value = null,
        $placeholder = null,
        $class = '',
        $label_styles = null,
        $disabled = "false",
        $icon = null
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->label = $label;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->class = $class;
        $this->label_styles = $label_styles;
        $this->disabled = $disabled;
        $this->icon = $icon;
    }

    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
