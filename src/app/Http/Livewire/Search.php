<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use App\Models\Blog;
use Livewire\Component;

class Search extends Component
{

    public $query;
    public $blogs;

    public function render()
    {
        return view('livewire.search');
    }

    public function updatedQuery($value)
    {
        if ($value != "" OR $value != null) {
            $this->blogs = Blog::where('title', 'LIKE', '%'.$value.'%')
                            ->orWhere('writer', 'LIKE', '%'.$value.'%')->get();
        }else {
            $this->blogs = null;
        }
    }

}
