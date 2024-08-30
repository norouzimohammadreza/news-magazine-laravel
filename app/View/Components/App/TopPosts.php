<?php

namespace App\View\Components\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TopPosts extends Component
{
    /**
     * Create a new component instance.
     */
    public $topSelectedPosts,$breakingNews;
    public function __construct($topSelectedPosts,$breakingNews)
    {
        $this->topSelectedPosts=$topSelectedPosts;
        $this->breakingNews=$breakingNews;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app.top-posts');
    }
}
