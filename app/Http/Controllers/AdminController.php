<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('is_admin', 1)->get();

        return view('dashboard.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //validate
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => ['required', 'string', 'min:8'],
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->email_verified_at = now();
        $admin->password = Hash::make($request->password);
        if ($request->role == "superadmin") {
            $admin->is_super_admin = 1;
            $admin->is_admin = 1;
            $admin->is_agent = 1;
        }
        if ($request->role == "staff") {
            $admin->is_staff = 1;
        }
        if ($request->role == "agent") {
            $admin->is_agent = 1;
        }
        if ($request->role == "admin") {
            $admin->is_admin = 1;
        }
        $admin->save();

        return redirect()->route('admins.index')->with('message', "New User Authorization.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::find($id);
        return view('dashboard.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        //validate
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->email_verified_at = now();
        if ($request->has('password')) {
            $admin->password = Hash::make($request->password);
        }
        if ($request->role == "superadmin") {
            $admin->is_super_admin = 1;
            $admin->is_admin = 1;
        }
        if ($request->role == "staff") {
            $admin->is_staff = 1;
        }
        if ($request->role == "agent") {
            $admin->is_agent = 1;
        }
        if ($request->role == "admin") {
            $admin->is_admin = 1;
        }
        $admin->save();

        return redirect()->route('admins.index')->with('message', "Edited User Authorization information.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect()->back()->with('message', "Admin Authorization revolked / and account deleted.");
    }
}
