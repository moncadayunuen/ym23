<?php

namespace App\Http\Controllers\Admin;

use App\CategoryProject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectsCategoriesController extends Controller
{
    public function index()
    {
        $this->authorize('update', new CategoryProject);
        $categories = CategoryProject::all();
        return view('admin.projects.categories.index', compact('categories'));
    }

    public function edit(CategoryProject $category)
    {
        $this->authorize('update', $category);

        return view('admin.projects.categories.edit', compact('category'));
    }

    public function update(Request $request, CategoryProject $category)
    {
        $this->authorize('update', $category);

        $request->validate(
            [ 
                'name' => 'required|max:155'
            ], 
            [
                'name.required' => 'Es necesario un nombre para la categoría', 
                'name.max' => 'Se excedieron el limite de 155 carácteres'
            ]
        );

        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.projects.categories.edit', $category)->with('success','Se actualizó la categoría correctamente');
    }

    public function destroy(CategoryProject $category)
    {
        $this->authorize('update', $category);
        $category->delete();
        return redirect()->route('admin.projects.categories.index')->with('success','Se eliminó la categoría correctamente');
    }
}
