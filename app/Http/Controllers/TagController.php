<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(Tag $tag){
        $posts = $tag->posts()->where('status', 1)->latest('id')->paginate(4);
        return view('post.tag', compact('posts', 'tag'));
    }

    public function edit(Tag $tag){

    }

    public function update(Request $request, Tag $tag){

    }

    public function destroy(Tag $tag){

    }
}
