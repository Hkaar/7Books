<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class svbNavigationBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public bool $search = false, public bool $menus = false, public string $active = "")
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.svb-navigation-bar', [
            "search" => $this->search,
            "menus" => $this->menus,
            "active" => $this->active,
        ]);
    }
}
