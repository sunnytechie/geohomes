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
                            ->where('category', "For Sale")->paginate(12);

        $propertiesForRent = Property::orderBy('id', 'desc')
                            ->where('category', "For Rent")->paginate(12);

        $destinations = Destination::orderBy('id', 'desc')->paginate(12); 
        
        $apertmentUrl = route('page.sorted', ['parameter_name' => "apertment"]);
        $houseUrl = route('page.sorted', ['parameter_name' => "house"]);
        $officeUrl = route('page.sorted', ['parameter_name' => "office"]);
        $villaUrl = route('page.sorted', ['parameter_name' => "villa"]);

        return view('welcome', compact('projects', 'apertmentUrl', 'houseUrl', 'officeUrl', 'villaUrl', 'destinations', 'propertiesForSale', 'propertiesForRent'));
    }

    public function error() {
        return view('errors.404');
    }
}
