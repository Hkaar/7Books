<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PaginateCounter extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $items,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.paginate-counter', [
            'items' => $this->items,
        ]);
    }
}
