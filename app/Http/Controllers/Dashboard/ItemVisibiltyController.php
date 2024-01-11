<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Project;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemVisibiltyController extends Controller
{
    public function visibility($item, $id) {
        //item can be property or project
        switch ($item) {
            case 'property':
                $property = Property::find($id);
                //check if status is true or false
                if ($property->status == 1) {
                    $property->status = 0;
                } else {
                    $property->status = 1;
                }
                $property->save();

            break;

            case 'project':
                $project = Project::find($id);
                //check if status is true or false
                if ($project->status == 1) {
                    $project->status = 0;
                } else {
                    $project->status = 1;
                }
                $project->save();

            break;

            default:
                return back()->with('message', "Item not set");
                    break;
        }


        //return back
        return back()->with('message', "Action Successfull");
    }
}
