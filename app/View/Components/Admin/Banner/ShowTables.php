<?php

namespace App\View\Components\Admin\Banner;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowTables extends Component
{
    /**
     * Create a new component instance.
     */
    public $banners;

    public function __construct($banners)
    {
        $this->banners = $banners;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.banner.show-tables');
    }
}
