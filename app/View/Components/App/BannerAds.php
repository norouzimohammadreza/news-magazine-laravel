<?php

namespace App\View\Components\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BannerAds extends Component
{
    /**
     * Create a new component instance.
     */
    public $banner;
    public function __construct($banner)
    {
        $this->banner=$banner;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app.banner-ads');
    }
}
