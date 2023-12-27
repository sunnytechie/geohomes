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
            'state' => '',
            'price' => 'required|integer',
            'country' => '',
            'description' => '',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable',
        ]);

        //dd($request->all());

        $imagePath = request('image')->store('projects', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1080, 1080);
        $image->save();

        if ($request->hasFile('file1')) {
            $file1Path = request('file1')->store('projects', 'public');
            $file1 = Image::make(public_path("storage/{$file1Path}"))->fit(1080, 1080);
            $file1->save();
        }
        if ($request->hasFile('file2')) {
            $file2Path = request('file2')->store('projects', 'public');
            $file2 = Image::make(public_path("storage/{$file2Path}"))->fit(1080, 1080);
            $file2->save();
        }
        if ($request->hasFile('file3')) {
            $file3Path = request('file3')->store('projects', 'public');
            $file3 = Image::make(public_path("storage/{$file3Path}"))->fit(1080, 1080);
            $file3->save();
        }
        if ($request->hasFile('file4')) {
            $file4Path = request('file4')->store('projects', 'public');
            $file4 = Image::make(public_path("storage/{$file4Path}"))->fit(1080, 1080);
            $file4->save();
        }

        //store
        $project = new Project();
        $project->title = $request->title;
        $project->address = $request->address;
        $project->state = $request->state;
        $project->country = $request->country;
        $project->map_embed_code = $request->map_embed_code;
        $project->description = $request->description;
        $project->price = $request->price;
        $project->video = $request->video;
        $project->image = $imagePath;
        if ($request->hasFile('file1')) {
            $project->file1 = $file1Path;
            }
            if ($request->hasFile('file2')) {
            $project->file2 = $file2Path;
            }
            if ($request->hasFile('file3')) {
            $project->file3 = $file3Path;
            }
            if ($request->hasFile('file4')) {
            $project->file4 = $file4Path;
            }
        $project->save();

        //redirect
        return redirect()->route('projects.index')->with('message', 'Estate created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        $project->views += 1;
        $project->save();

        return view('project.show', compact('project'));
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
            'state' => '',
            'price' => 'required|integer',
            'country' => '',
            'description' => '',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable',
        ]);

        //dd($request->all());
        if ($request->hasFile('image')) {
        $imagePath = request('image')->store('projects', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1080, 1080);
        $image->save();
        }

        if ($request->hasFile('file1')) {
            $file1Path = request('file1')->store('projects', 'public');
            $file1 = Image::make(public_path("storage/{$file1Path}"))->fit(1080, 1080);
            $file1->save();
        }
        if ($request->hasFile('file2')) {
            $file2Path = request('file2')->store('projects', 'public');
            $file2 = Image::make(public_path("storage/{$file2Path}"))->fit(1080, 1080);
            $file2->save();
        }
        if ($request->hasFile('file3')) {
            $file3Path = request('file3')->store('projects', 'public');
            $file3 = Image::make(public_path("storage/{$file3Path}"))->fit(1080, 1080);
            $file3->save();
        }
        if ($request->hasFile('file4')) {
            $file4Path = request('file4')->store('projects', 'public');
            $file4 = Image::make(public_path("storage/{$file4Path}"))->fit(1080, 1080);
            $file4->save();
        }

        //store
        $project = Project::find($id);
        $project->title = $request->title;
        $project->address = $request->address;
        $project->state = $request->state;
        $project->country = $request->country;
        $project->price = $request->price;
        $project->map_embed_code = $request->map_embed_code;
        $project->description = $request->description;
        $project->video = $request->video;
        if ($request->hasFile('image')) {
        $project->image = $imagePath;
        }
        if ($request->hasFile('file1')) {
            $project->file1 = $file1Path;
            }
            if ($request->hasFile('file2')) {
            $project->file2 = $file2Path;
            }
            if ($request->hasFile('file3')) {
            $project->file3 = $file3Path;
            }
            if ($request->hasFile('file4')) {
            $project->file4 = $file4Path;
            }
        $project->save();

        //redirect
        return redirect()->back()->with('message', 'Estate Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->back()->with('message', 'Estate deleted successfully.');

    }
}
