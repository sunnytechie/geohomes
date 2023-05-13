<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Property;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $projects = Project::orderBy('id', 'desc')->paginate(12);
        
        $propertiesForSale = Property::orderBy('id', 'desc')
                            ->where('category', "For Sale")->paginate(12);

        $propertiesForRent = Property::orderBy('id', 'desc')
                            ->where('category', "For Rent")->paginate(12);

        return view('welcome', compact('projects', 'propertiesForSale', 'propertiesForRent'));
    }

    public function error() {
        return view('errors.404');
    }
}
