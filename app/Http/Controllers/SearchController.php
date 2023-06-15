<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        
        $properties = Property::where('lint_in', $request->status)
                        ->orWhere('category', $request->type)
                        ->orWhere('title', 'like', '%' . $request->key_word . '%')
                        ->orWhere('bedrooms', $request->bedroom)
                        ->orWhere('bathrooms', $request->bathrooms)
                        ->orWhere('state', $request->city)
                        ->get();
                        
                        return view('pages.buyrent', compact('properties'));

    }
}
