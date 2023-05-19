<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    // Method to resend the verification email
    public function resend(Request $request)
    {
        
        $user = $request->user();
        //dd($user);

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('index.welcome')->with('success', 'Your email is already verified.');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'A new verification link has been sent to your email address.');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('index.welcome')->with('success', 'Your email has been verified.');
    }
}
