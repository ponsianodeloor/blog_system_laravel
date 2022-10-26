<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){


    }

    public function create(){

    }

    public function store(Request $request){

    }

    public function show(Category $category){
        $posts = Post::where('category_id', '=', $category->id)->paginate(10);
        return view('categories.show', compact('category', 'posts'));
    }

    public function edit(Category $category){

    }

    public function update(Request $request, Category $category){

    }

    public function destroy(Category $category){

    }
}
