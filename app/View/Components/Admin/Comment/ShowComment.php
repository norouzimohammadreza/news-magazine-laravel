<?php

namespace App\View\Components\Admin\Comment;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowComment extends Component
{
    /**
     * Create a new component instance.
     */
    public $comments;

    public function __construct($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.comment.show-comment');
    }
}
