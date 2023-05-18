<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::orderBy('id', 'desc')->get();
        return view('dashboard.destination.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.destination.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'price_range' => 'required',
            'state' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //dd($request->all());
        
        $imagePath = request('image')->store('projects', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(540, 675);
        $image->save();

        $destination = new Destination();
        $destination->price_range = $request->price_range;
        $destination->state = $request->state;
        $destination->image = $imagePath;
        $destination->save();

        return redirect()->route('destinations.index')->with('message', "You have successfully posted a new destination sample.");

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destination = Destination::find($id);
        $destination->delete();
        return redirect()->route('destinations.index')->with('message', "You have successfully deleted a destination reel.");
    }
}
