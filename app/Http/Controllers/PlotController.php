<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use App\Models\Project;
use Illuminate\Http\Request;

class PlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plots = Plot::orderBy('id', 'desc')->get();
        return view('dashboard.plot.index', compact('plots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('dashboard.plot.new', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'project_id' => 'required',
            'description' => '',
        ]);

        //dd($request->all());

        $plot = new Plot();
        $plot->title = $request->title;
        $plot->project_id = $request->project_id;
        $plot->description = $request->description;
        $plot->save();

        return redirect()->route('plots.index')->with('message', "Plot has been added to an estate.");
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
        $plot = Plot::find($id);
        $projects = Project::orderBy('id', 'desc')->get();
        return view('dashboard.plot.edit', compact('projects', 'plot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'project_id' => 'required',
            'description' => '',
        ]);

        //dd($request->all());

        $plot = Plot::find($id);
        $plot->title = $request->title;
        $plot->project_id = $request->project_id;
        $plot->description = $request->description;
        $plot->save();

        return redirect()->back()->with('message', "This Plot has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plot = Plot::find($id);
        $plot->delete();

        return redirect()->route('plots.index')->with('message', "Plot has been deleted from the databasse.");
       
    }
}
