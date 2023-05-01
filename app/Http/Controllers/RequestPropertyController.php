<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestPropertyController extends Controller
{
    public function new() {
        return view('request.new');
    }

    public function store(Request $request) {
        return redirect()->back()->with('message', 'request for your property has been submitted to our admin. We be in contact as soon as possible, thank you and have a great day😊.');
    }
}
