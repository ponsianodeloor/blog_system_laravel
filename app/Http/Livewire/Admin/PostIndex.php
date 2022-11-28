<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::where('user_id', auth()->user()->id)
            ->where('name', 'LIKE', '%'.$this->search.'%')
            ->paginate();
        return view('livewire.admin.post-index', compact('categories', 'tags', 'posts'));
    }

    public function updatingSearch(){
        $this->resetPage();
    }
}
