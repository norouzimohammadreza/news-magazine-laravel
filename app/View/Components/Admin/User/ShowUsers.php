<?php

namespace App\View\Components\Admin\User;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowUsers extends Component
{
    /**
     * Create a new component instance.0
     */
    public $users;
    public function __construct($users)
    {
        $this->users=$users;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.user.show-users');
    }
}
