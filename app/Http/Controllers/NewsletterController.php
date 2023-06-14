<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request) {
        $email = $request->input('email');

        // Perform validation if required

        // Store the email in the database
        Subscriber::create(['email' => $email]);

        return response()->json(['success' => true]);
    }
}
