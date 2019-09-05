<?php

namespace App\Http\Controllers\Admin;

use App\CategoryProject;
use App\Project;
use Carbon\Carbon;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\StoreProjectNewRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Project);

        $projects = Project::latest()->get();
        
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $this->authorize('create', new Project);

        $categories = CategoryProject::orderBy('id', 'DESC')->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(StoreProjectNewRequest $request)
    {
        $this->authorize('create', new Project);

        $validate = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filePath = $file->store('public/projects');
        }

        $project = new Project;
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->client = $request->input('client');
        $project->website = $request->input('website');
        $project->created = Carbon::parse($request->input('created'));
        $project->thumbnail = Storage::url($filePath);
        $project->content = $request->input('content');

        $project->category_project_id = CategoryProject::find($request->input('category_id'))
                                ? $request->input('category_id')
                                : CategoryProject::create(['name' => $request->input('category_id'), 'url' => str_slug($request->input('category_id'))])->id;
        $project->save();
        return redirect()->route('admin.projects.index')->with('success', 'Se ha creado un nuevo proyecto');
    }

    public function show($id)
    {
        //
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        $categories = CategoryProject::orderBy('id', 'DESC')->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $validate = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $imgPath = str_replace('storage', 'public', $project->thumbnail);
            Storage::delete($imgPath);
            $file = $request->file('thumbnail');
            $filePath = $file->store('public/projects');

            $project->title = $request->input('title');
            $project->description = $request->input('description');
            $project->client = $request->input('client');
            $project->website = $request->input('website');
            $project->created = Carbon::parse($request->input('created'));
            $project->thumbnail = Storage::url($filePath);
            $project->content = $request->input('content');
    
            $project->category_project_id = CategoryProject::find($request->input('category_id'))
                                    ? $request->input('category_id')
                                    : CategoryProject::create(['name' => $request->input('category_id'), 'url' => str_slug($request->input('category_id'))])->id;
            $project->save();
        } else {
            $project->title = $request->input('title');
            $project->description = $request->input('description');
            $project->client = $request->input('client');
            $project->website = $request->input('website');
            $project->created = Carbon::parse($request->input('created'));
            $project->content = $request->input('content');

            $project->category_project_id = CategoryProject::find($request->input('category_id'))
                                    ? $request->input('category_id')
                                    : CategoryProject::create(['name' => $request->input('category_id'), 'url' => str_slug($request->input('category_id'))])->id;
            $project->save();
        }
        return redirect()->route('admin.projects.edit', $project)->with('success', 'Se ha actualizado el proyecto');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();
        $imgPath = str_replace('storage', 'public', $project->thumbnail);
        Storage::delete($imgPath);
        return redirect()->route('admin.projects.index')->with('success', 'Se ha eliminado el proyecto');
    }
}
