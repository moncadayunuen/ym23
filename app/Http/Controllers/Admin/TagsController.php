<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.posts.tags.index', compact('tags'));
    }

    public function edit(Tag $tag)
    {
        return view('admin.posts.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
        ],[
            'name.required' => 'Es necesario un nombre para el tag',
            'name.max' => 'El nombre del tag excede los 40 carácteres'
        ]);

        $tag->name = $request->input('name');
        $tag->save();

        return redirect()->route('admin.posts.tags.edit', $tag)->with('success', 'Se ha eliminado el tag correctamente');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.posts.tags.index')->with('success', 'Se ha eliminado el tag correctamente');
    }
}
