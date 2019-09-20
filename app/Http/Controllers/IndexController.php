<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Post;
use App\Project;
use App\Career;
use App\CategoryProject;
use App\Mail\ContactEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'careers' => Career::all(),
            'post' => Post::whereNotNull('published_at')->orderBy('published_at','DESC')->take(1)->get(),
            'posts' => Post::whereNotNull('published_at')->orderBy('published_at','DESC')->take(3)->skip(1)->get()
        ]);
    }

    public function aboutMe()
    {
        return view('about', [
            'careers' => Career::all()
        ]);
    }

    public function blog()
    {
        $postsCategories = Category::all();
        $tags = Tag::all();
        $posts = Post::whereNotNull('published_at')->latest('published_at')->paginate(4);
        return view('blog.index', [
            'postsCategories' => $postsCategories ,
            'tags' => $tags, 
            'posts' => $posts
        ]);
    }

    public function showBlogPost(Post $post) {
        $categories = Category::all();
        $posts = Post::whereNotNull('published_at')->latest('published_at')->get();
        $categories = CategoryProject::all();
        return view('blog.show', compact('post', 'categories', 'posts','categories'));
    }

    public function categories(Category $category)
    {
        $posts =  $category->posts()->paginate(4);
        $tags = Tag::all();
        $allposts = Post::whereNotNull('published_at')->latest('published_at')->get();
        return view('blog.categories', [
            'posts' => $posts,
            'allposts' => $allposts,
            'tags' => $tags
        ]);
    }

    public function tags(Tag $tag)
    {
        $posts =  $tag->posts()->paginate(4);
        $tags = Tag::all();
        $allPosts = Post::whereNotNull('published_at')->latest('published_at')->get();
        return view('blog.tags', [
            'posts' => $posts,
            'allPosts' => $allPosts,
            'tags' => $tags        
        ]);
    }

    public function projects() {
        return view('projects.index', [
            'projects' =>  Project::all(),
            'categories' => CategoryProject::orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function categoryProjects(CategoryProject $category) {
        $projects =  $category->projects()->orderBy('created', 'DESC')->get();

        return view('projects.categories', [
            'projects' => $projects,
            'categories' => CategoryProject::all()
        ]);
    }

    public function showProject(Project $project) {
        return view('projects.show', [
            'project' => $project,
        ]);
    }

    public function contact() {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        Mail::send(new ContactEmail($request));
        return redirect()->route('contact')->with('success','Te contestaremos lo más pronto posible');
    }
}
