<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function initiateLandPayment(Request $request, $id)
    {
        $project = Project::find($id);
        return view('project.client', compact('project'));
    }
    public function initiateLandPaymentPost() {

    }
}
