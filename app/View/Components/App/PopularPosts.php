<?php

namespace App\View\Components\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PopularPosts extends Component
{
    /**
     * Create a new component instance.
     */
    public $popularPosts;
    public function __construct($popularPosts)
    {
        $this->popularPosts = $popularPosts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app.popular-posts');
    }
}