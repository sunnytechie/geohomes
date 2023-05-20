<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function show() {
        return view('account.profile');
    }

    public function update(Request $request) {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            //'password' => ['nullable', 'string', 'min:8'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        //if ($request->oldPassword != null) {
            // Compare the entered password with the hashed user password
        //    if (Hash::check($request->oldPassword != Auth::user()->password)) {
        //        return redirect()->back()->with('message', "Incorrect Old password. try again.");
        //    }

            //Password Check
        //    if ($request->password != $request->password_confirmation) {
        //        return redirect()->back()->with('message', "Password Mismatched. Kindly enter the new password again.");
        //    }

        //}

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
        //if ($request->password != null) {
        //$user->password = Hash::make($request->password);
        //}
        $user->save();

        return redirect()->back()->with('message', "Your Profile has been updated successfully");
    }
}
