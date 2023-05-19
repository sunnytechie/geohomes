<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function show() {
        return view('account.profile');
    }

    public function update(Request $request) {
        dd("Still working on it.");
        $request->validate([
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($request->has('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500, 500);
            $image->save();
        }
        
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        if ($request->has('image')) {
            $user->image = $imagePath;
        }
        if ($request->has('newPassword')) {

        }
        $user->save();

        return redirect()->back()->with('message', "Your Profile is updated successfully");
    }
}
