<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::orderBy('id', 'desc')->paginate();

        return view('system.tags.index', compact('tags'));
    }

    public function create(){

    }

    public function store(Request $request){
        $tag = new Tag();

        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->color = $request->color;

        $tag->save();

        return redirect()->route('system.admin.tags.index')->with('message_info', 'La Categoria se ha guardado con exito');
    }

    public function show(Tag $tag){

    }

    public function edit(Tag $tag){

    }

    public function update(Request $request, Tag $tag){

    }

    public function destroy(Tag $tag){

    }
}
