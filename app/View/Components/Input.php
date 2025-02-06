<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Input extends Component
{
    public string $name, $label, $type, $icon, $required;

    public function __construct(string $name, string $label, string $type, string $icon, string $required)
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
        $this->icon = $icon;
        $this->required = $required;
    }

    public function render(): View|Closure|string
    {
        return view('shared.form.input');
    }
}