<?php

namespace App\Http\Controllers;

use App\Mail\ScheduleEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Inspectiontransaction;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->is_admin) {
            $inspections = Inspectiontransaction::orderBy('id', 'desc')
                            ->where('status', 1)->get();
        } else {
            $inspections = Inspectiontransaction::orderBy('id', 'desc')
                            ->where('status', 1)
                            ->where('user_id', Auth::user()->id)
                            ->get();
        }

        return view('dashboard.schedule.index', compact('inspections'));
    }

    public function schedulePost(Request $request) {
        //dd($request->all());
        $inspect = Inspectiontransaction::find($request->inspect_id);

        return view('dashboard.schedule.schedule', compact('inspect'));
    }

    public function scheduleUpdate(Request $request, $id) {
        //dd($request->all());
        $inspect = Inspectiontransaction::find($request->inspect_id);
        $inspect->schedule_date = $request->schedule_date;
        $inspect->schedule_time = $request->schedule_time;
        $inspect->status = 1;
        $inspect->schedule_status = 1;
        $inspect->save();

        $time = Carbon::createFromFormat('H:i', $request->schedule_time)->format('h:i A');
        $date = Carbon::parse($request->schedule_date)->format('j F Y');
        //dd($date);
        $name = $inspect->user->name;
        $email = $inspect->user->email;
        $date = $date;
        $time = $time;

        $compose = [
            'name' => $name,
            'email' => $email,
            'date' => $date,
            'time' => $time,
        ];

         //send email
         Mail::to($email)->send(new ScheduleEmail($name, $email, $date, $time));

        return redirect()->route('schedule')->with('message', "Schedule is successful and email notification sent to user, thank you.");
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
        //
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
