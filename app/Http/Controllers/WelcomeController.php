<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $projects = Project::orderBy('id', 'desc')->paginate(12);
        
        return view('welcome', compact('projects'));
    }

    public function error() {
        return view('errors.404');
    }
}
