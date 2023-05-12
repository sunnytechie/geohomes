<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::orderBy('id', 'desc')->get();
        //dd($properties);
        return view('dashboard.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.property.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'lint_in' => 'required',
            'price' => '',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'size_in_fit' => '',
            'lot_size_in_fit' => '',
            'rooms' => '',
            'bedrooms' => '',
            'bathrooms' => '',
            'garages' => '',
            'garage_size' => '',
            'year_built' => '',
            'available_from' => 'nullable|date',
            'basement' => '',
            'extra_details' => '',
            'roofing' => '',
            'exterior_material' => '',
            'structure_type' => '',
            'floors_no' => '',
            'house_type' => '',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        
        $imagePath = request('image')->store('properties', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1080, 1080);
        $image->save();

        if ($request->hasFile('file1')) {
            $file1Path = request('file1')->store('properties', 'public');
            $file1 = Image::make(public_path("storage/{$file1Path}"))->fit(1080, 1080);
            $file1->save();
        }
        if ($request->hasFile('file2')) {
            $file2Path = request('file2')->store('properties', 'public');
            $file2 = Image::make(public_path("storage/{$file2Path}"))->fit(1080, 1080);
            $file2->save();
        }
        if ($request->hasFile('file3')) {
            $file3Path = request('file3')->store('properties', 'public');
            $file3 = Image::make(public_path("storage/{$file3Path}"))->fit(1080, 1080);
            $file3->save();
        }
        if ($request->hasFile('file4')) {
            $file4Path = request('file4')->store('properties', 'public');
            $file4 = Image::make(public_path("storage/{$file4Path}"))->fit(1080, 1080);
            $file4->save();
        }

        $property = new Property();
        $property->user_id = Auth()->user()->id;
        $property->title = $request->title;
        $property->description = $request->description;
        $property->category = $request->category;
        $property->lint_in = $request->lint_in;
        $property->price = $request->price;
        $property->address = $request->address;
        $property->state = $request->state;
        $property->city = $request->city;
        $property->zip = $request->zip;
        $property->country = $request->country;
        $property->size_in_fit = $request->size_in_fit;
        $property->lot_size_in_fit = $request->lot_size_in_fit;
        $property->rooms = $request->rooms;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->garages = $request->garages;
        $property->garage_size = $request->garage_size;
        $property->year_built = $request->year_built;
        $property->available_from = $request->available_from;
        $property->basement = $request->basement;
        $property->extra_details = $request->extra_details;
        $property->roofing = $request->roofing;
        $property->exterior_material = $request->exterior_material;
        $property->structure_type = $request->structure_type;
        $property->floors_no = $request->floors_no;
        $property->house_type = $request->house_type;
        $property->image = $imagePath;
        if ($request->hasFile('file1')) {
        $property->file1 = $file1Path;
        }
        if ($request->hasFile('file2')) {
        $property->file2 = $file2Path;
        }
        if ($request->hasFile('file3')) {
        $property->file3 = $file3Path;
        }
        if ($request->hasFile('file4')) {
        $property->file4 = $file4Path;
        }
        $property->save();

        return redirect()->route('properties.index')->with('message', 'You have published a new property. <a href="' . route('properties.show', ['property' => $property->id]) . '">Click here</a> to see details.');
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
        $property = Property::find($id);

        return view('dashboard.property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'lint_in' => 'required',
            'price' => '',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'size_in_fit' => '',
            'lot_size_in_fit' => '',
            'rooms' => '',
            'bedrooms' => '',
            'bathrooms' => '',
            'garages' => '',
            'garage_size' => '',
            'year_built' => '',
            'available_from' => 'nullable|date',
            'basement' => '',
            'extra_details' => '',
            'roofing' => '',
            'exterior_material' => '',
            'structure_type' => '',
            'floors_no' => '',
            'house_type' => '',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = request('image')->store('properties', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1080, 1080);
            $image->save();
        }

        if ($request->hasFile('file1')) {
            $file1Path = request('file1')->store('properties', 'public');
            $file1 = Image::make(public_path("storage/{$file1Path}"))->fit(1080, 1080);
            $file1->save();
        }
        if ($request->hasFile('file2')) {
            $file2Path = request('file2')->store('properties', 'public');
            $file2 = Image::make(public_path("storage/{$file2Path}"))->fit(1080, 1080);
            $file2->save();
        }
        if ($request->hasFile('file3')) {
            $file3Path = request('file3')->store('properties', 'public');
            $file3 = Image::make(public_path("storage/{$file3Path}"))->fit(1080, 1080);
            $file3->save();
        }
        if ($request->hasFile('file4')) {
            $file4Path = request('file4')->store('properties', 'public');
            $file4 = Image::make(public_path("storage/{$file4Path}"))->fit(1080, 1080);
            $file4->save();
        }

        $property = Property::find($id);
        $property->title = $request->title;
        $property->description = $request->description;
        $property->category = $request->category;
        $property->lint_in = $request->lint_in;
        $property->price = $request->price;
        $property->address = $request->address;
        $property->state = $request->state;
        $property->city = $request->city;
        $property->zip = $request->zip;
        $property->country = $request->country;
        $property->size_in_fit = $request->size_in_fit;
        $property->lot_size_in_fit = $request->lot_size_in_fit;
        $property->rooms = $request->rooms;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->garages = $request->garages;
        $property->garage_size = $request->garage_size;
        $property->year_built = $request->year_built;
        $property->available_from = $request->available_from;
        $property->basement = $request->basement;
        $property->extra_details = $request->extra_details;
        $property->roofing = $request->roofing;
        $property->exterior_material = $request->exterior_material;
        $property->structure_type = $request->structure_type;
        $property->floors_no = $request->floors_no;
        $property->house_type = $request->house_type;
        if ($request->hasFile('file1')) {
        $property->image = $imagePath;
        }
        if ($request->hasFile('file1')) {
        $property->file1 = $file1Path;
        }
        if ($request->hasFile('file2')) {
        $property->file2 = $file2Path;
        }
        if ($request->hasFile('file3')) {
        $property->file3 = $file3Path;
        }
        if ($request->hasFile('file4')) {
        $property->file4 = $file4Path;
        }
        $property->save();

        return redirect()->route('properties.index')->with('message', 'You have edited a property. <a href="' . route('properties.show', ['property' => $property->id]) . '">Click here</a> to see details.');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::find($id);
        $property->delete();

        return redirect()->back()->with('message', "Porperty deleted successfully.");
    }
}
