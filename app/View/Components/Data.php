<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Data extends Component
{
    public string $name, $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function render(): View|Closure|string
    {
        return view('shared.ui.data');
    }
}