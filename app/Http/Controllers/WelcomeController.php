<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Post;
use App\Models\Project;
use App\Models\Building;
use App\Models\Property;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index() {

        $projects = Project::inRandomOrder()->orderBy('id', 'desc')->paginate(6);

        $propertiesForSale = Property::inRandomOrder()->orderBy('id', 'desc')
                            ->where('lint_in', "For Sale")->paginate(6);

        $propertiesForRent = Property::inRandomOrder()->orderBy('id', 'desc')
                            ->where('lint_in', "For Rent")->paginate(6);

        $buildings = Building::inRandomOrder()->orderBy('id', 'desc')->paginate(6);

        $apertmentUrl = route('page.sorted', ['parameter_name' => "Apartment"]);
        $houseUrl = route('page.sorted', ['parameter_name' => "House"]);
        $officeUrl = route('page.sorted', ['parameter_name' => "Office"]);
        $landUrl = route('page.sorted', ['parameter_name' => "Land"]);

        $posts = Post::orderBy('id', 'desc')->paginate(10);
        //randomize the posts
        $posts = $posts->shuffle();

        $adverts = Advert::inRandomOrder()->orderBy('id', 'desc')->paginate(5);

        return view('welcome', compact('projects', 'adverts', 'posts', 'apertmentUrl', 'houseUrl', 'officeUrl', 'landUrl', 'buildings', 'propertiesForSale', 'propertiesForRent'));
    }

    public function estate($id) {
        $project = Project::find($id);
        $ogTitle = $project->title;
        $ogDescription = $project->description;
        $ogImage = $project->image;
        //increment the views
        $project->increment('views');
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('estate', compact('project', 'posts', 'ogTitle', 'ogDescription', 'ogImage'));
    }

    public function error() {
        return view('errors.404');
    }

    public function property($id) {
        $property = Property::find($id);
        $ogTitle = $property->title;
        $ogDescription = $property->description;
        $ogImage = $property->image;
        return view('property.show', compact('property', 'ogTitle', 'ogDescription', 'ogImage'));
    }
}
