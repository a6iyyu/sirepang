<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class Radio extends Component
{
    public array $options;
    public string $name, $label;
    public ?string $value;

    public function __construct(array $options, string $name, string $label, ?string $value)
    {
        $this->options = $options;
        $this->name = $name;
        $this->label = $label;
        $this->value = $value;
    }

    public function render(): View|Closure|string
    {
        return view('shared.form.radio');
    }
}