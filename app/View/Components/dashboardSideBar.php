<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dashboardSideBar extends Component
{
    public $selected;

    /**
     * Create a new component instance.
     */
    public function __construct(string $selected)
    {
        $this->selected = $selected;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-side-bar')->with([
            "selected" => $this->selected
        ]);
    }
}