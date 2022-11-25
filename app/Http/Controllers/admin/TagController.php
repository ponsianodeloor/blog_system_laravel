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
        return view('system.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag){
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:tags,slug,$tag->id",
            'color'=>"required"
        ]);

        $tag->name = $request->name;
        $tag->slug = $request->slug;
        $tag->color = $request->color;

        $tag->save();

        return redirect()->route('system.admin.tags.index')->with('message_info', 'El Tag se actualizo con exito');
    }

    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('system.admin.tags.index')->with('message_info', 'El Tag se eliminado correctamente');
    }
}
