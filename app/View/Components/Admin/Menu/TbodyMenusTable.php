<?php

namespace App\View\Components\Admin\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TbodyMenusTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $menus;

    public function __construct($menus)
    {
        $this->menus = $menus;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.menu.tbody-menus-table');
    }
}
