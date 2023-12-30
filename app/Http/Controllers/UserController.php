<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();

        return view('dashboard.users.index', compact('users'));
    }

    public function subscribers()
    {
        $subscribers = Subscriber::orderBy('id', 'asc')->get();

        return view('dashboard.users.subscribers', compact('subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $transactions = Transaction::where('user_id', $id)->get();

        return view('dashboard.users.customer', compact('user', 'transactions'));
    }

    public function showPartner(string $id)
    {
        $user = User::find($id);
        //$transactions = Transaction::where('user_id', $id)->get();

        return view('dashboard.users.partner', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
