<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
        //dd($request->all());
        return view('pages.sorted');
    }

    public function projects() {
        $projects = Project::orderBy('id', 'desc')->paginate(12);
        return view('pages.projects', compact('projects'));
    }

}
