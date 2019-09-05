<?php

namespace App\Http\Controllers\Admin;

use App\Career;
use App\Http\Requests\UpdateCareerNewRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Career);

        return view('admin.cv.index', [
            'careers' => Career::all()
        ]);
    }

    public function edit(Career $career)
    {
        $this->authorize('update', $career);

        return view('admin.cv.edit', compact('career'));
    }

    public function update(UpdateCareerNewRequest $request, Career $career)
    {
        $this->authorize('update', $career);
        $validated = $request->validated();

        if ($request->has('photo'))
        {
            $photoPath = str_replace('storage', 'public', $career->photo);
            Storage::delete($photoPath);
            $photoFile = $request->file('photo');
            $photoPath = $photoFile->store('public/cv');

            $career->title = $request->input('title');
            $career->description = $request->input('description');
            $career->photo =  Storage::url($photoPath);
            $career->subtitle = $request->input('subtitle');
            $career->content = $request->input('content');
            $career->save();
        } else if ($request->has('cv_file')) {
            $cvPath = str_replace('storage', 'public', $career->cv_file);
            Storage::delete($cvPath);
            $cvFile = $request->file('cv_file');
            $cvPath = $cvFile->store('public/cv');

            $career->title = $request->input('title');
            $career->description = $request->input('description');
            $career->cv_file =  Storage::url($cvPath);
            $career->subtitle = $request->input('subtitle');
            $career->content = $request->input('content');
            $career->save();
        } else if ($request->has('photo') && $request->has('cv_file')){
            $photoPath = str_replace('storage', 'public', $career->photo);
            Storage::delete($photoPath);
            $photoFile = $request->file('photo');
            $photoPath = $photoFile->store('public/cv');
            
            $cvPath = str_replace('storage', 'public', $career->cv_file);
            Storage::delete($cvPath);
            $cvFile = $request->file('cv_file');
            $cvPath = $cvFile->store('public/cv');

            $career->title = $request->input('title');
            $career->description = $request->input('description');
            $career->photo =  Storage::url($photoPath);
            $career->cv_file =  Storage::url($cvPath);
            $career->subtitle = $request->input('subtitle');
            $career->content = $request->input('content');
            $career->save();
        } else {
            $career->title = $request->input('title');
            $career->description = $request->input('description');
            $career->subtitle = $request->input('subtitle');
            $career->content = $request->input('content');
            $career->save();
        }
        
        return back()->with('success', 'Se ha actualizado el curriculum exitosamente');
    }

}
