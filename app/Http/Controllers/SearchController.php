<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $status = $request->status;
        $type = $request->type;
        $bedroom = $request->bedroom;
        $bathrooms = $request->bathrooms;
        $city = $request->city;
        $keyword = $request->key_word;


        //dd($type);
        if ($status !== null || $type !== null || $bedroom !== null || $bathrooms !== null || $city !== null) {
            //dd('wait first');
            $properties = Property::where('lint_in', $status)
                ->where('status', true)
                ->orWhere('bedrooms', $bedroom)
                ->orWhere('bathrooms', $bathrooms)
                ->orWhere('state', $city)
                ->orWhere('category', $type)
                ->get();
        } elseif ($type == null) {
            $properties = Property::search($keyword)
                ->where('status', true)
                ->get();
        }
        else {
            $properties = Property::search($keyword)
                ->where('status', true)
                ->where('category', $type)
                ->get();
            }

        $slideproperties = Property::inRandomOrder()->where('status', true)->paginate(6);

        return view('property.search', compact('properties', 'slideproperties',
        'status',
        'type',
        'bedroom',
        'bathrooms',
        'city',
        'keyword',
    ));

    }
}
