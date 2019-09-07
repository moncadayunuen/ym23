<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\UpdateCategoryPost;
use Illuminate\Support\Facades\Storage;
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

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filePath = $file->store('public/categories');
        }

        Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'thumbnail' => Storage::url($filePath)
        ]);

        return redirect()->route('admin.categories.index')->with('success','¡Una nueva categoría ha sido creada exitosamente!');
    }
    public function edit(Category $category)
    {
        $this->authorize('update', $category);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryPost $request, Category $category)
    {
        $this->authorize('update', $category);

        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $imgPath = str_replace('storage', 'public', $category->thumbnail);
            Storage::delete($imgPath);
            $file = $request->file('thumbnail');
            $filePath = $file->store('public/categories');

            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->thumbnail = Storage::url($filePath);
            $category->save();
        } else {
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();
        }

        return redirect()->route('admin.categories.edit', $category)->with('success','¡Se ha actualizado exitosamente la categoria!');
    }
    public function destroy($id)
    {
        $this->authorize('delete', $category);

        $category = Category::find($id);
        $category->delete();
        return back()->with('success','Se ha eliminado exitosamente la categoría!');
    }
}
