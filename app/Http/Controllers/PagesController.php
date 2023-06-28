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

    public function buyRent(Request $request) {
        $status = $request->status;
        $type = $request->type;
        $bedroom = $request->bedroom;
        $bathrooms = $request->bathrooms;
        $city = $request->city;
        $keyword = $request->key_word;
        $properties = Property::orderBy('id', 'desc')->get();
        $slideproperties = Property::orderBy('id', 'desc')->paginate(4);
        
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

        $filteredProperties = Property::orderBy('id', 'desc')
                            ->where('category', $request->parameter_name)->paginate(10);

        $properties = Property::orderBy('id', 'desc')->paginate(4);

        return view('pages.sorted', compact('properties', 'countFilteredProperties', 'filteredProperties',
        'status',
        'type',
        'bedroom',
        'bathrooms',
        'city',
        'keyword'));
    }

    public function projects() {
        $projects = Project::orderBy('id', 'desc')->paginate(12);
        return view('pages.projects', compact('projects'));
    }

}
