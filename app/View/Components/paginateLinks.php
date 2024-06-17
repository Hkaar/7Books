<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PaginateLinks extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $links, public bool $useHtmx = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.paginate-links')->with([
            "links" => $this->links,
            "useHtmx" => $this->useHtmx,
        ]);
    }
}
