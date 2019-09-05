<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostEditRequest;
use App\Http\Requests\StoreNewPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::allowed()->get();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $this->authorize('create', new Post);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function store(StoreNewPost $request)
    {
        $this->authorize('update', new Post);

        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $imgUrl = $file->store('public/posts');
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        $post->published_at = $request->input('published_at');
        $post->content = $request->input('content');
        $post->thumbnail = Storage::url($imgUrl);
        $post->user_id = auth()->id();
        $post->save();

        $post->syncTags($request->input('tags'));
        
        return redirect()->route('admin.posts.index')->with('success', 'Se ha creado una nueva publicación');
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);
        
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::whereNotNull('published_at')->latest('published_at')->get();
        return view('blog.show', [
            'post' => $post,
            'tags' => $tags,
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories','tags'));
    }

    public function update(Post $post, UpdatePostEditRequest $request)
    {
        $this->authorize('update', $post);
        
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $imgPath = str_replace('storage', 'public', $post->thumbnail);
            Storage::delete($imgPath);

            $file = $request->file('thumbnail');
            $imgUrl = $file->store('public/posts');

            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->category_id = $request->input('category_id');
            $post->published_at = $request->input('published_at');
            $post->content = $request->input('content');
            $post->thumbnail = Storage::url($imgUrl);
            $post->save();
        }

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->category_id = $request->input('category_id');
        $post->published_at = $request->input('published_at');
        $post->content = $request->input('content');
        $post->save();

        $post->syncTags($request->input('tags'));

        return redirect()->route('admin.posts.edit', $post->url)->with('success', 'Se actualizó correctamente la publicación');
    }

    public function destroy(POST $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        $imgPath = str_replace('storage', 'public', $post->thumbnail);
        Storage::delete($imgPath);
        return redirect()->route('admin.posts.index')->with('success', 'La publicación se ha eliminado correctamente');
    }
}
