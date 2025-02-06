<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Menu extends Component
{
    public string $icon, $route, $style;
    public bool $sidebar;

    public function __construct(string $icon, string $route, bool $sidebar = false, string $style)
    {
        $this->icon = $icon;
        $this->route = $route;
        $this->sidebar = $sidebar;
        $this->style = $style;
    }

    public function render(): View|Closure|string
    {
        return view('shared.navigation.menu');
    }
}