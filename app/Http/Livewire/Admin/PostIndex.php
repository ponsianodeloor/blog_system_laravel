<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Post;

class PostIndex extends Component
{
    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('livewire.admin.post-index', compact('posts'));
    }
}
