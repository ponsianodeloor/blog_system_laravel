<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\MarketService;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:system.admin.categories.store')->only('create','store');
        $this->middleware('can:system.admin.categories.edit')->only('edit', 'show');
        $this->middleware('can:system.admin.categories.update')->only('update');
        $this->middleware('can:system.admin.categories.destroy')->only('destroy');
    }

    public function index(){
        $categories = Category::orderBy('id', 'desc')->paginate();

        return view('system.categories.index', compact('categories'));
    }

    public function create(){

    }

    public function store(Request $request){
        $category = new Category();

        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->save();

        return redirect()->route('system.admin.categories.index')->with('message_info', 'La Categoria se ha guardado con exito');
    }

    public function show(Category $category){
        return view();
    }

    public function edit(Category $category){
        return view('system.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category){
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:categories,slug,$category->id"
        ]);

        $category->name = $request->name;
        $category->slug = $request->slug;

        $category->save();

        return redirect()->route('system.admin.categories.index')->with('message_info', 'La Categoria se actualizo con exito');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('system.admin.categories.index')->with('message_info', 'La Categoria se eliminado correctamente con exito');
    }
}
