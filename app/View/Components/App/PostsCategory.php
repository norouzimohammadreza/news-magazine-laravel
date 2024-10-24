<?php

namespace App\View\Components\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostsCategory extends Component
{
    /**
     * Create a new component instance.
     */
    public $posts;
    public function __construct($posts)
    {
        $this->posts=$posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app.posts-category');
    }
}
