<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class Select extends Component
{
    public array $options;
    public ?bool $required;
    public string $class, $label, $name;
    public ?string $value;

    public function __construct(array $options, ?bool $required, string $class, string $label, string $name, ?string $value)
    {
        $this->options = $options;
        $this->required = $required;
        $this->class = $class;
        $this->label = $label;
        $this->name = $name;
        $this->value = $value;
    }

    public function render(): View|Closure|string
    {
        return view('shared.form.select');
    }
}