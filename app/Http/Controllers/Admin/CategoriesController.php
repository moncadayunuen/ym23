<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\StoreNewPostCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Category);

        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', new Category);

        return view('admin.categories.create');
    }

    public function store(StoreNewPostCategory $request)
    {
        $this->authorize('create', new Category);

        $validated = $request->validated();

        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('admin.categories.index')->with('success','¡Una nueva categoría ha sido creada exitosamente!');
    }
    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(StoreNewPostCategory $request, Category $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validated();

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return back()->with('success','¡Se ha actualizado exitosamente la categoria!');
    }
    public function destroy($id)
    {
        $this->authorize('delete', $category);

        $category = Category::find($id);
        $category->delete();
        return back()->with('success','Se ha eliminado exitosamente la categoría!');
    }
}
