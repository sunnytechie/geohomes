<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Project;
use App\Models\Property;
use App\Models\Destination;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $properties = Property::where('user_id', Auth::user()->id)->get();
        $invoices = Invoice::where('user_id', Auth::user()->id)->get();
        $projects = Project::all();
        $agents = Agent::all();
        $destinations = Destination::all();
        
        return view('dashboard.index', compact('properties', 'invoices', 'projects', 'agents', 'destinations'));
    }
}
