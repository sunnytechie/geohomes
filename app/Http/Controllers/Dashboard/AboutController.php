<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Team;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        if (!$about) {
            // Create about
            $about = About::create([
                'video' => 'https://www.youtube.com/watch?v=JGwWNGJdvx8',
                'title' => 'We are a home of innovative solutions.',
                'description' => 'Geohomes Services Limited is a private limited liability company duly registered under the Companies and Allied Matters Act of 1990 on 12th August, 2020 with RC. No. 1696212.',
                'office_heading' => 'We are devoted to offering you properties that stand the test of time and market changes. ',
                'office_location' => '26 Moorehouse street Ogui Enugu.',
                'office_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.6468249970967!2d7.492525573327757!3d6.439381724138578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a3d8f51f6071%3A0x6b07f5ee68d7e660!2s26%20Moorehouse%20St%2C%20Ogui%20400001%2C%20Enugu!5e0!3m2!1sen!2sng!4v1685829579897!5m2!1sen!2sng',
            ]);
        }

        return view('dashboard.about.index', compact('about'));
    }

    public function services()
    {
        
        $services = Service::orderBy('id', 'desc')->get();

        return view('dashboard.about.service', compact('services'));
    }

    public function teams()
    {
        $teams = Team::orderBy('id', 'desc')->get();

        return view('dashboard.about.team', compact('teams'));
    }

    public function aboutVideo(Request $request)
    {
        $request->validate([
            //'video' => 'required|mimes:mp4|max:20000'
            'video' => 'required',
        ]);

        //$video = $request->file('video');
        //$videoName = time() . '.' . $video->extension();
        //$video->move(public_path('videos'), $videoName);

        $about = About::first();
        $about->video = $request->video;
        $about->save();

        return redirect()->back()->with('success', 'Video uploaded successfully');
    }

    public function update(Request $request, $about)
    {
        //dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'office_heading' => 'required',
            'office_location' => 'required',
            'office_map' => 'required',
        ]);

        $about = About::find($about);
        $about->title = $request->title;
        $about->description = $request->description;
        $about->office_heading = $request->office_heading;
        $about->office_location = $request->office_location;
        $about->video = $request->video;
        $about->save();

        return redirect()->back()->with('message', 'About info updated successfully');
    }

    public function serviceStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('message', 'Service added successfully');
    }

    public function serviceEdit($service)
    {
        $service = Service::find($service);

        return view('dashboard.about.editservice', compact('service'));
    }

    public function serviceUpdate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $service = Service::find($request->id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        return redirect()->back()->with('message', 'Service updated successfully');
    }

    public function serviceDelete(Request $request)
    {
        $service = Service::find($request->id);
        $service->delete();

        return redirect()->back()->with('message', 'Service deleted successfully');
    }

    public function teamStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:20000',
        ]);

            $imagePath = request('image')->store('teams', 'public');

            // Load the image
            $image = Image::make(public_path("storage/{$imagePath}"));

            // Resize the image to a width of 840px and adjust the height proportionally
            $image->resize(840, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Save the resized image
            $image->save();

        Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imagePath,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
        ]);

        return redirect()->back()->with('message', 'Team member added successfully');
    }

    public function teamEdit($team)
    {
        $team = Team::find($team);

        return view('dashboard.about.editteam', compact('team'));
    }

    public function teamUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
        ]);

        $team = Team::find($request->id);
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        $team->linkedin = $request->linkedin;
        if ($request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png|max:20000',
            ]);

            $imagePath = request('image')->store('teams', 'public');

            // Load the image
            $image = Image::make(public_path("storage/{$imagePath}"));

            // Resize the image to a width of 840px and adjust the height proportionally
            $image->resize(840, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Save the resized image
            $image->save();

            $team->image = $imagePath;
        }
        $team->save();

        return redirect()->back()->with('message', 'Team member updated successfully');
    }

    public function teamDelete(Request $request)
    {
        $team = Team::find($request->id);
        $team->delete();

        return redirect()->back()->with('message', 'Team member deleted successfully');
    }

    public function gallery()
    {
        $galleries = Gallery::orderBy('id', 'desc')->get();

        return view('dashboard.about.gallery', compact('galleries'));
    }

    public function galleryStore(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:20000',
        ]);

        $imagePath = request('image')->store('gallery', 'public');

        // Load the image
        $image = Image::make(public_path("storage/{$imagePath}"));

        // Resize the image to a width of 840px and adjust the height proportionally
        $image->resize(840, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // Save the resized image
        $image->save();

        Gallery::create([
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('message', 'Image added successfully');
    }

    public function imageDelete(Request $request)
    {
        $gallery = Gallery::find($request->id);
        $gallery->delete();

        return redirect()->back()->with('message', 'Image deleted successfully');
    }

}
