<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\Service;
use App\Models\Building;
use App\Models\Property;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class PagesController extends Controller
{
    public function about() {
        $about = About::first();
        $services = Service::orderBy('id', 'desc')->get();
        $teams = Team::orderBy('id', 'desc')->get();
        $galleries = Gallery::orderBy('id', 'desc')->paginate(8);
        return view('pages.about', compact('about', 'services', 'teams', 'galleries'));
    }

    public function agents() {
        return view('pages.agents');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function faq() {
        return view('pages.faq');
    }

    public function listings() {
        return view('pages.listings');
    }

    public function services() {
        return view('pages.services');
    }

    public function buyRent(Request $request) {
        $status = $request->status;
        $type = $request->type;
        $bedroom = $request->bedroom;
        $bathrooms = $request->bathrooms;
        $city = $request->city;
        $keyword = $request->key_word;
        $properties = Property::inRandomOrder()
                        ->where('status', true)
                        ->paginate(10);

        $slideproperties = Property::where('status', true)
                        ->paginate(4);

        return view('pages.buyrent', compact('properties', 'slideproperties',
        'status',
        'type',
        'bedroom',
        'bathrooms',
        'city',
        'keyword'));
    }

    public function sorted(Request $request) {
        //sort according to link address
        //dd($request->parameter_name);
        //4 properties
        $status = $request->status;
        $type = $request->type;
        $bedroom = $request->bedroom;
        $bathrooms = $request->bathrooms;
        $city = $request->city;
        $keyword = $request->key_word;

        $countFilteredProperties = Property::where('category', $request->parameter_name)->get();

        $filteredProperties = Property::inRandomOrder()
                            ->where('status', true)
                            ->where('category', $request->parameter_name)->paginate(10);

        $properties = Property::inRandomOrder()
                            ->where('status', true)->paginate(4);

        return view('pages.sorted', compact('properties', 'countFilteredProperties', 'filteredProperties',
        'status',
        'type',
        'bedroom',
        'bathrooms',
        'city',
        'keyword'));
    }

    public function projects() {
        $order = "Default";
        $projects = Project::inRandomOrder()
                    ->where('status', true)
                    ->paginate(10);

        $posts = Post::inRandomOrder()->paginate(5);
        return view('pages.projects', compact('projects', 'posts', 'order'));
    }

    public function projectAsc() {
        $order = "Ascending";
        $projects = Project::orderBy('id', 'asc')
                    ->where('status', true)
                    ->paginate(10);

        $posts = Post::inRandomOrder()
                    ->orderBy('id', 'desc')
                    ->paginate(5);

        return view('pages.projects', compact('projects', 'posts', 'order'));
    }

    public function projectDesc() {
        $order = "Descending";
        $projects = Project::orderBy('id', 'desc')
                    ->where('status', true)
                    ->paginate(10);

        $posts = Post::inRandomOrder()
                    ->orderBy('id', 'desc')
                    ->paginate(5);

        return view('pages.projects', compact('projects', 'posts', 'order'));
    }

    public function projectRadom() {
        $order = "Random";
        $projects = Project::inRandomOrder()
                    ->where('status', true)
                    ->paginate(10);

        $posts = Post::inRandomOrder()
                    ->orderBy('id', 'desc')
                    ->paginate(5);

        return view('pages.projects', compact('projects', 'posts', 'order'));
    }

    public function building() {
        $buildings = Building::orderBy('id', 'desc')->get();

        return view('pages.building', compact('buildings'));
    }

}
