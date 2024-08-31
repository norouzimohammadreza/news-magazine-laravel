<?php

namespace App\View\Components\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LatestPosts extends Component
{
    /**
     * Create a new component instance.
     */
    public $latestPosts;
    public function __construct($latestPosts)
    {
        $this->latestPosts=$latestPosts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app.latest-posts');
    }
}
