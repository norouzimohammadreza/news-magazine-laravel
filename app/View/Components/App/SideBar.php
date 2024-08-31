<?php

namespace App\View\Components\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideBar extends Component
{
    /**
     * Create a new component instance.
     */
    public $mostComments,$banner;
    public function __construct($mostComments,$banner)
    {
        $this->mostComments=$mostComments;
        $this->banner=$banner;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app.side-bar');
    }
}
