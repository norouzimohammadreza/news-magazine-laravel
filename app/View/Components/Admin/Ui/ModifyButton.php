<?php

namespace App\View\Components\Admin\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModifyButton extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $url, public string $name)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.ui.modify-button');
    }
}
