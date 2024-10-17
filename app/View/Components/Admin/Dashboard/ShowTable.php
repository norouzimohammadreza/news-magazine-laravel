<?php

namespace App\View\Components\Admin\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $mostViewsPosts, $mostCommentsPosts, $mostCommentsUsers;

    public function __construct($mostViewsPosts, $mostCommentsPosts, $mostCommentsUsers)
    {
        $this->mostViewsPosts = $mostViewsPosts;
        $this->mostCommentsPosts = $mostCommentsPosts;
        $this->mostCommentsUsers = $mostCommentsUsers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.dashboard.show-table');
    }
}
