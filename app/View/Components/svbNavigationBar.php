<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\User;

class SVBNavigationBar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $search = false, 
        public bool $menus = false, 
        public string $active = "", 
        public bool $login = true,
        public bool $logo = true,
        public bool $avatar = true,
        public readonly bool $priviledged = false
    ) {
        $user = auth()->user();

        if ($user instanceof User && $user->checkRole(["admin", "operator"])) {
            $this->priviledged = true;
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
            "priviledged" => $this->priviledged,
            "login" => $this->login,
            "logo" => $this->logo,
            "avatar" => $this->avatar,
        ]);
    }
}
