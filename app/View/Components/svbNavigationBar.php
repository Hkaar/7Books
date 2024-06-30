<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class svbNavigationBar extends Component
{
    public bool $isPriviledged = false;

    /**
     * Create a new component instance.
     */
    public function __construct(public bool $search = false, public bool $menus = false, public string $active = "")
    {
        if (auth()->user() && in_array(auth()->user()->role, ["admin", "operator"])) {
            $this->isPriviledged = true;
        }
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
            "priviledged" => $this->isPriviledged,
        ]);
    }
}
