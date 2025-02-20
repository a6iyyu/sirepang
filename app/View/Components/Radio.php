<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Radio extends Component
{
    public array $options;
    public ?bool $required;
    public string $name, $label;

    public function __construct(array $options, ?bool $required, string $name, string $label)
    {
        $this->options = $options;
        $this->required = $required;
        $this->name = $name;
        $this->label = $label;
    }

    public function render()
    {
        return view('shared.form.radio');
    }
}
