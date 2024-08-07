<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SvbNavigationBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $menus = false,
        public string $active = '',
        public bool $login = true,
        public bool $logo = true,
        public bool $avatar = true,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.svb-navigation-bar', [
            'menus' => $this->menus,
            'active' => $this->active,
            'login' => $this->login,
            'logo' => $this->logo,
            'avatar' => $this->avatar,
        ]);
    }
}
