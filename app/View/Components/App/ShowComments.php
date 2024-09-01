<?php

namespace App\View\Components\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowComments extends Component
{
    /**
     * Create a new component instance.
     */
    public $comments;
    public function __construct($comments)
    {
        $this->comments=$comments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app.show-comments');
    }
}
