<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BlockUserController extends Controller
{
    public function blockUnblockUser($user_id)
    {
        $user = User::find($user_id);
        if ($user->blocked) {
            $user->blocked = 0;
            $user->save();
            return back()->with('message', 'User unblocked successfully.');
        }
        else {
            $user->blocked = 1;
            $user->save();
            return back()->with('message', 'User blocked successfully.');
        }
    }

    public function unblockUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->blocked = 0;
        $user->save();
        return response()->json(['success' => 'User unblocked successfully.']);
    }
}
