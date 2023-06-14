<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Project;
use App\Models\Property;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $projects = Project::orderBy('id', 'desc')->paginate(12);
        
        $propertiesForSale = Property::orderBy('id', 'desc')
                            ->where('lint_in', "For Sale")->paginate(12);

        $propertiesForRent = Property::orderBy('id', 'desc')
                            ->where('lint_in', "For Rent")->paginate(12);

        $destinations = Destination::orderBy('id', 'desc')->paginate(12); 
        
        $apertmentUrl = route('page.sorted', ['parameter_name' => "Apartment"]);
        $houseUrl = route('page.sorted', ['parameter_name' => "House"]);
        $officeUrl = route('page.sorted', ['parameter_name' => "Office"]);
        $villaUrl = route('page.sorted', ['parameter_name' => "Villa"]);

        return view('welcome', compact('projects', 'apertmentUrl', 'houseUrl', 'officeUrl', 'villaUrl', 'destinations', 'propertiesForSale', 'propertiesForRent'));
    }

    public function estate($id) {
        $project = Project::find($id);
        $project->views += 1;
        $project->save();

        return view('estate', compact('project'));
    }

    public function error() {
        return view('errors.404');
    }
}
