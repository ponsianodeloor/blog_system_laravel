<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', '=', '1')->latest('id')->paginate(8);
        return view('post.index', compact('posts'));
    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(Post $post){
        $posts_similares = Post::where('category_id', '=', $post->category_id)
        ->where('status', '=', 1)
        ->where('id', '!=', $post->id)
        ->latest('id') //es similar a order By Desc
        ->take(4)
        ->get();

        return view('post.show', compact('post', 'posts_similares'));
    }

    public function edit(Post $post){

    }

    public function update(Request $request, Post $post){

    }

    public function destroy(Post $post){

    }
}
