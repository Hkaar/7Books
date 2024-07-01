<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\User;

class svbNavigationBar extends Component
{
    public bool $isPriviledged = false;

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
    ) {
        $user = auth()->user();

        if ($user instanceof User && $user->checkRole(["admin", "operator"])) {
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
            "login" => $this->login,
            "logo" => $this->logo,
            "avatar" => $this->avatar,
        ]);
    }
}
