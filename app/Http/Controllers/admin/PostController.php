<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('system.posts.index', compact('posts'));
    }

    public function indexLivewire(){
        return view('system.posts.index_livewire');
    }

    public function create(){

    }

    public function store(Request $request){
        $post = new Post();

        $post->name = $request->name;
        $post->slug = $request->slug;
        $post->extract = $request->extract;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;

        $post->save();

        if ($request->tags){
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('system.admin.posts.index.livewire');
    }

    public function show($id){

    }

    public function edit(Post $post){
        $categories = Category::all();
        $tags = Tag::all();
        return view('system.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post){
        $post->name = $request->name;
        $post->slug = $request->slug;
        $post->extract = $request->extract;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->category_id = $request->category_id;

        $post->save();

        if ($request->tags){
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('system.admin.posts.index.livewire');
    }

    public function destroy($id){

    }
}
