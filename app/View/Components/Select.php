<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public string $name;
    public string $label;
    public array $options;
    public bool $required;

    public function __construct(string $name, string $label, array $options, bool $required = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->required = $required;
    }

    public function render()
    {
        return view('shared.form.select');
    }
}
