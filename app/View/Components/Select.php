<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class Select extends Component
{
    public array $options;
    public ?bool $required;
    public string $name;
    public ?string $label, $selected, $value;

    public function __construct(array $options, ?bool $required, string $name, ?string $label = null, ?string $selected = null, ?string $value = null)
    {
        $this->options = $options;
        $this->required = $required;
        $this->label = $label;
        $this->name = $name;
        $this->selected = $selected;
        $this->value = $value;
    }

    public function render(): View|Closure|string
    {
        return view('shared.form.select');
    }
}