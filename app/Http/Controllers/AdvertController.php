<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adverts = Advert::all();
        return view('dashboard.advert.index', compact('adverts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.advert.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url'
        ]);

        //image upload
        if ($request->has('image')) {
            //$imagePath = request('image')->store('posts', 'public');

            // Load the image
            //$image = Image::make(public_path("storage/{$imagePath}"));

            // Resize the image to fit within 990x512 without cropping
            //$image->resize(1920, 250, function ($constraint) {
            //    $constraint->aspectRatio();
            //    $constraint->upsize();
            //});

            // Save the modified image
            //$image->save(public_path("storage/{$imagePath}"));
            //$imagePath = request('image')->store('profile', 'public');
            //$image = Image::make(public_path("storage/{$imagePath}"))->fit(1920, 1000);
            //$image->save();
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio(); // Maintain the aspect ratio
                $constraint->upsize(); // Prevent up-sizing if the original image is smaller
            });
            $image->save();

        }

        //store data
        Advert::create([
            'title' => $request->title,
            'thumbnail' => $imagePath,
            'link' => $request->link,
        ]);

        //redirect
        return redirect()->route('advert.index')->with('message', 'Advert created successfully');
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
        return view('dashboard.advert.edit');
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
        //destroy
        Advert::destroy($id);

        return redirect()->route('advert.index')->with('message', 'Advert deleted successfully');
    }
}
