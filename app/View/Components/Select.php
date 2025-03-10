<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public string $name, $label;
    public array $options;
    public ?array $value;

    public function __construct(string $name, string $label, array $options, ?array $value)
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value;
    }

    public function render()
    {
        return view('shared.form.select');
    }
}