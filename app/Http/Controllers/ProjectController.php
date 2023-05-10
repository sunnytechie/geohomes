<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('dashboard.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.project.new');
    }

    public function projectImage() {
        print"Good";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validate
        $request->validate([
            'title' => 'required',
            'map_embed_code' => 'required',
            'address' => '',
            'description' => '',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //dd($request->all());
        
        $imagePath = request('image')->store('projects', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1080, 1080);
        $image->save();

        //store
        $project = new Project();
        $project->title = $request->title;
        $project->address = $request->address;
        $project->map_embed_code = $request->map_embed_code;
        $project->description = $request->description;
        $project->image = $imagePath;
        $project->save();

        //redirect
        return redirect()->route('projects.index')->with('message', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        return view('dashboard.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate
        $request->validate([
            'title' => 'required',
            'map_embed_code' => 'required',
            'address' => '',
            'description' => '',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //dd($request->all());
        if ($request->hasFile('image')) {
        $imagePath = request('image')->store('projects', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1080, 1080);
        $image->save();
        }

        //store
        $project = Project::find($id);
        $project->title = $request->title;
        $project->address = $request->address;
        $project->map_embed_code = $request->map_embed_code;
        $project->description = $request->description;
        if ($request->hasFile('image')) {
        $project->image = $imagePath;
        }
        $project->save();

        //redirect
        return redirect()->back()->with('message', 'Project Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->back()->with('message', 'Project deleted successfully.');

    }
}
