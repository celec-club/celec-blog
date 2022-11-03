<?php

namespace App\View\Components;

use App\Models\Blog as BlogModel;
use Illuminate\View\Component;

class Blog extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public BlogModel $blog)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog');
    }
}
