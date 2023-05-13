<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Destination;
use App\Models\Project;
use App\Models\Property;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $properties = Property::all();
        $projects = Project::all();
        $agents = Agent::all();
        $destinations = Destination::all();
        
        return view('dashboard.index', compact('properties', 'projects', 'agents', 'destinations'));
    }
}
