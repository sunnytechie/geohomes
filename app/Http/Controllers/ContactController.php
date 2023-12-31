<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request) {
        //dd($request->all());
        //validate capcha
        $request->validate([
            'g-recaptcha-response' => 'required|captcha'
        ]);

        //gather data
        $fName = $request->first_name;
        $lName = $request->last_name;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;

        $compose = [
            'fName' => $fName,
            'lName' => $lName,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
        ];

        //send email
        $recipient = "nnam.ug@gmail.com";
        Mail::to($recipient)->send(new ContactEmail($fName, $lName, $email, $phone, $message));

        return redirect()->back()->with('message', "Your message is sent successfully, we will respond to you shortly. Thank you.");
    }
}
