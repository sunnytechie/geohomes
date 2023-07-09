<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::orderBy('id', 'desc')->get();
        //dd($properties);
        $exists = Agent::where('user_id', Auth::user()->id)->exists();
        if ($exists) {
            return view('dashboard.property.index', compact('properties'));
        } else {
            return redirect()->route('agent.profile.join', Auth::user()->id);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        #$properties->count();
        $exists = Agent::where('user_id', Auth::user()->id)->exists();
        if ($exists) {
            //dd($properties);
            if (Auth::user()->is_admin == 0) {
                if (Auth::user()->manager == 0) {
                    $properties = Property::where('user_id', Auth::user()->id)->count();
                    if (Auth::user()->agent->subscribed == 0 && $properties >= 3) {
                        //redirect to notice page
                        return redirect()->route('agentupgrade');
                    }
                }
            }
        
        return view('dashboard.property.new');
        } else {
            return redirect()->route('agent.profile.join', Auth::user()->id);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        if (Auth::user()->is_admin == 0) {
            if (Auth::user()->manager == 0) {
                $properties = Property::where('user_id', Auth::user()->id)->count();
                if (Auth::user()->agent->subscribed == 0 && $properties >= 3) {
                    //redirect to notice page
                    return redirect()->route('agentupgrade');
                }
            }
        }

        //validate
        $validator = Validator::make($request->all(), [
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'file1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'file2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'file3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'file4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with('message', "There are error with the informations you wannt to upload, please try again.")
                            ->withErrors($validator)
                            ->withInput();
        }
        

        //dd($request->all());

            if ($request->has('image')) {
                $imagePath = request('image')->store('products', 'public');
                $image = Image::make(public_path("storage/{$imagePath}"))
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $image->save();
            }
            if ($request->has('file1')) {
                $file1Path = request('file1')->store('products', 'public');
                $file1 = Image::make(public_path("storage/{$file1Path}"))
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $file1->save();
            }
            if ($request->has('file2')) {
                $file2Path = request('file2')->store('products', 'public');
                $file2 = Image::make(public_path("storage/{$file2Path}"))
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $file2->save();
            }
            if ($request->has('file3')) {
                $file3Path = request('file3')->store('products', 'public');
                $file3 = Image::make(public_path("storage/{$file3Path}"))
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $file3->save();
            }
            if ($request->has('file4')) {
                $file4Path = request('file4')->store('products', 'public');
                $file4 = Image::make(public_path("storage/{$file4Path}"))
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
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
        $property = Property::find($id);
        return view('property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exists = Agent::where('user_id', Auth::user()->id)->exists();
        if ($exists) {
        $property = Property::find($id);

            return view('dashboard.property.edit', compact('property'));
        } else {
            return redirect()->route('agent.profile.join', Auth::user()->id);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate
        $validator = Validator::make($request->all(), [
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'file1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'file2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'file3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'file4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with('message', "There are error with the informations you wannt to upload, please try again.")
                            ->withErrors($validator)
                            ->withInput();
        }


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
        if ($request->hasFile('image')) {
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
