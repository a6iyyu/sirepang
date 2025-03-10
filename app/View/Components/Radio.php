<?php

namespace App\View\Components;

use Illuminate\View\Component;

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

    public function render()
    {
        return view('shared.form.radio');
    }
}
