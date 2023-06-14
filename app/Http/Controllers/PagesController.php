<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Property;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about() {
        return view('pages.about');
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

    public function buyRent() {
        return view('pages.buyrent');
    }

    public function sorted(Request $request) {
        //sort according to link address
        //dd($request->parameter_name);
        //4 properties
        $countFilteredProperties = Property::where('category', $request->parameter_name)->get();

        $filteredProperties = Property::orderBy('id', 'desc')
                            ->where('category', $request->parameter_name)->paginate(10);

        $properties = Property::orderBy('id', 'desc')->paginate(4);

        return view('pages.sorted', compact('properties', 'countFilteredProperties', 'filteredProperties'));
    }

    public function projects() {
        $projects = Project::orderBy('id', 'desc')->paginate(12);
        return view('pages.projects', compact('projects'));
    }

}
