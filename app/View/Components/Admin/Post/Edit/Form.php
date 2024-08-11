<?php

namespace App\View\Components\Admin\Post\Edit;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     */
    public $categories,$post;
    public function __construct($categories,$post)
    {
        $this->categories=$categories;
        $this->post= $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.post.edit.form');
    }
}
