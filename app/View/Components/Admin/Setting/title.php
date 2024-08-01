<?php

namespace App\View\Components\Admin\Setting;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class showUsers extends Component
{
    /**
     * Create a new component instance.0
     */
    public $setting;
    public function __construct($setting)
    {
        $this->setting=$setting;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.user.show-users');
    }
}
