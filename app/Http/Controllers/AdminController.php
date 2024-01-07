<?php

namespace App\Http\Controllers;

use App\Models\Agent;
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
        //admin
        //manager
        //staff
        //auditor
        //accountant
        //marketer
        //secretary
        $admins = User::where('is_admin', 1)
        ->orWhere('manager', 1)
        ->orWhere('is_staff', 1)
        ->orWhere('auditor', 1)
        ->orWhere('accountant', 1)
        ->orWhere('marketer', 1)
        ->orWhere('secretary', 1)
        ->get();

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
            'email' => ['required', 'string', 'email', 'unique:users'],
            'role' => 'required',
            'password' => ['required', 'string', 'min:8'],
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        $admin->email_verified_at = now();
        $admin->agent_profile = "agent";
        $admin->user_type = 1;
        $admin->password = Hash::make($request->password);
        if ($request->role == "admin") {
            $admin->is_admin = 1;
            $admin->is_agent = 1;
            $admin->role = "admin";
        }
        if ($request->role == "manager") {
            $admin->manager = 1;
            $admin->is_admin = 1;
            $admin->is_agent = 1;
            $admin->role = "manager";
        }
        if ($request->role == "agent") {
            $admin->is_agent = 1;
            $admin->role = "agent";
        }
        if ($request->role == "staff") {
            $admin->is_staff = 1;
            $admin->role = "staff";
            $admin->is_agent = 1;
        }
        if ($request->role == "auditor") {
            $admin->auditor = 1;
            $admin->role = "auditor";
            $admin->is_agent = 1;
        }
        if ($request->role == "accountant") {
            $admin->accountant = 1;
            $admin->role = "accountant";
            $admin->is_agent = 1;
        }
        if ($request->role == "marketer") {
            $admin->marketer = 1;
            $admin->role = "marketer";
            $admin->is_agent = 1;
        }
        if ($request->role == "secretary") {
            $admin->secretary = 1;
            $admin->role = "secretary";
            $admin->is_agent = 1;
        }
        $admin->save();

        $agent = new Agent();
        $agent->user_id = $admin->id;
        $agent->subscribed = 1;
        $agent->agent_brand_name = "FBILTD";
        $agent->save();

        return redirect()->route('admins.index')->with('message', "New Admin Authorization.");
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
        if ($request->role == "admin") {
            $admin->is_admin = 1;
            $admin->is_agent = 1;
            $admin->role = "admin";
        }
        if ($request->role == "manager") {
            $admin->manager = 1;
            $admin->is_admin = 1;
            $admin->is_agent = 1;
            $admin->role = "manager";
        }
        if ($request->role == "agent") {
            $admin->is_agent = 1;
            $admin->role = "agent";
        }
        if ($request->role == "staff") {
            $admin->is_staff = 1;
            $admin->role = "staff";
        }
        if ($request->role == "auditor") {
            $admin->auditor = 1;
            $admin->role = "auditor";
        }
        if ($request->role == "accountant") {
            $admin->accountant = 1;
            $admin->role = "accountant";
        }
        if ($request->role == "marketer") {
            $admin->marketer = 1;
            $admin->role = "marketer";
        }
        if ($request->role == "secretary") {
            $admin->secretary = 1;
            $admin->role = "secretary";
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
