<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Post;
use App\Project;
use App\Career;
use App\CategoryProject;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'careers' => Career::all(),
            'categories' => CategoryProject::all()
        ]);
    }

    public function aboutMe()
    {
        return view('aboutMe.index', [
            'careers' => Career::all(),
            'categories' => CategoryProject::all()
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
            'posts' => $posts,
            'categories' => CategoryProject::all()
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
            'tags' => $tags,
            'categories' => CategoryProject::all()
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
            'tags' => $tags,
            'categories' => CategoryProject::all()
        ]);
    }

    public function categoryProjects(CategoryProject $category) {
        $projects =  $category->projects()->get();

        return view('projects.categories', [
            'projects' => $projects,
            'categories' => CategoryProject::all()
        ]);
    }

    public function showProject(Project $project) {
        return view('projects.show', [
            'project' => $project,
            'categories' => CategoryProject::all()
        ]);
    }

    public function contact() {
        return view('contact', [
            'categories' => CategoryProject::all()
        ]);
    }
}
