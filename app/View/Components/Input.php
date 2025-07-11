<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Input extends Component
{
    public string $name, $icon;
    public ?string $info, $label, $type, $value;
    public ?bool $required;

    public function __construct(string $icon, string $name, ?string $label = null, ?string $info = null, ?string $type = null, ?string $value = null, ?bool $required = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->info = $info;
        $this->type = $type;
        $this->icon = $icon;
        $this->value = $value;
        $this->required = $required;
    }

    public function render(): View|Closure|string
    {
        return view('shared.form.input');
    }
}