<?php

namespace App\Http\Controllers;

use App\Mail\SurveyMail;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SurveyController extends Controller
{
    public function survey($id) {
        $transaction = Transaction::find($id);
        $user = User::find($transaction->user_id);

        //dd();
        //Email
        $recipient = $user->email;
        $name = $user->name;
        Mail::to($recipient)->send(new SurveyMail($recipient, $name));

        //return back with message
        return back()->with('message', "An email with survey link has been sent to $user->email to apply for survey, thank you.");
    }
}
