<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public mixed $model,
        public string $title,
        public string $editRoute,
        public string $createRoute,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.detail-layout', [
            'model' => $this->model,
            'title' => $this->title,
            'editRoute' => $this->editRoute,
            'createRoute' => $this->createRoute,
        ]);
    }
}
