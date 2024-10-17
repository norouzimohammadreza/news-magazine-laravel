<?php

namespace App\View\Components\Admin\Menu\Edit;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public $menu, $menus;

    public function __construct($menu, $menus)
    {
        $this->menu = $menu;
        $this->menus = $menus;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.menu.edit.form');
    }
}
