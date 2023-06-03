<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use App\Mail\PlotEmail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //if isAdmin transaction list of all
        if (Auth::user()->is_admin) {
            $transactions = Transaction::orderBy('created_at', 'desc')->get();
        } else {
            //else transaction list of Auth user
            $transactions = Transaction::orderBy('id', 'desc')
                            ->where('user_id', Auth::user()->id)
                            ->get();
        }

        return view('dashboard.transactions.index', compact('transactions'));
    }

    public function allocate(Request $request) {
        //dd($request->all());
        $transaction = Transaction::find($request->transaction_id);
        $plots = Plot::orderBy('id', 'desc')
        ->where('project_id', $transaction->project_id)
        ->where('allocation_status', 0)
        ->get();

        return view('dashboard.transactions.allocate', compact('transaction', 'plots'));
    }

    public function allocatePost(Request $request) {
        //dd($request->all());
        $transaction = Transaction::find($request->transaction_id);
        $transaction->plot_id = $request->plot;
        $transaction->save();
        
        //dd($transaction);
        $plot = Plot::find($request->plot);
        //dd($plot);
        $plot->user_id = $transaction->user_id;
        $plot->allocation_status = 1;
        $plot->save();

        //send email
        ####
        //User info
        $clientEmail = $transaction->user->email;

        $clientName = $transaction->user->name;
        $clientAddress = $transaction->user->address;
        $clientCity = $transaction->user->city;
        $clientZip = $transaction->user->zip;

        //plot info
        $plotName = $plot->title;
        $plotNumber = $plot->id;
        $projectAddress = $plot->project->address;
        $projectName = $plot->project->title;

        $compose = [
            'clientName' => $clientName,
            'clientAddress' =>$clientAddress,
            'clientCity' =>$clientCity,
            'clientZip' =>$clientZip,
            'plotName' =>$plotName,
            'plotNumber' =>$plotNumber,
            'projectAddress' =>$projectAddress,
            'projectName' =>$projectName,
        ];

        //send email
        Mail::to($clientEmail)->send(new PlotEmail($clientName, $clientAddress, $clientCity, $clientZip, $plotName, $plotNumber, $projectAddress, $projectName));
        
        return redirect()->route('transaction')->with('message', "Plot allocation has just been made successfully, and email sent to user.");
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
