<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::orderBy('id', 'desc')->get();
        return view('dashboard.building.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.building.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'title' => 'required',
            'description' => '',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->has('file')) {
            $imagePath = request('file')->store('products', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image->save();
        }

        $building = new Building();
        $building->title = $request->title;
        $building->description = $request->description;
        if ($request->hasFile('file')) {
        $building->file = $imagePath;
        }
        $building->save();

        return redirect()->route('buildings.index')->with('message', "successfully published");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.building.show', compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $building = Building::find($id);
        return view('dashboard.building.edit', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate
        $request->validate([
            'title' => 'required',
            'description' => '',
            'file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->has('file')) {
            $imagePath = request('file')->store('products', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image->save();
        }

        $building = Building::find($id);
        $building->title = $request->title;
        $building->description = $request->description;
        if ($request->hasFile('file')) {
        $building->file = $imagePath;
        }
        $building->save();

        return redirect()->back()->with('message', "successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $building = Building::find($id);
        $building->delete();

        return back()->with('message', "Deleted successfully");
    }
}
