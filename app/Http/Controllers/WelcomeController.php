<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Project;
use App\Models\Property;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index() {
        
        $projects = Project::orderBy('id', 'desc')->paginate(12);
        
        $propertiesForSale = Property::orderBy('id', 'desc')
                            ->where('lint_in', "For Sale")->paginate(12);

        $propertiesForRent = Property::orderBy('id', 'desc')
                            ->where('lint_in', "For Rent")->paginate(12);

        $buildings = Building::orderBy('id', 'desc')->paginate(12); 
        
        $apertmentUrl = route('page.sorted', ['parameter_name' => "Apartment"]);
        $houseUrl = route('page.sorted', ['parameter_name' => "House"]);
        $officeUrl = route('page.sorted', ['parameter_name' => "Office"]);
        $landUrl = route('page.sorted', ['parameter_name' => "Land"]);

        return view('welcome', compact('projects', 'apertmentUrl', 'houseUrl', 'officeUrl', 'landUrl', 'buildings', 'propertiesForSale', 'propertiesForRent'));
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

    public function property($id) {
        $property = Property::find($id);
        return view('property.show', compact('property'));
    }
}
