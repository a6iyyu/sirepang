<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Radio extends Component
{
    public string $name;
    public string $label;
    public array $options;

    public function __construct(string $name, string $label, array $options)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
    }

    public function render()
    {
        return view('shared.form.radio');
    }
}
