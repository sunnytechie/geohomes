<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use App\Mail\PlotEmail;
use App\Models\Project;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Unicodeveloper\Paystack\Facades\Paystack;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //if isAdmin transaction list of all
        if (Auth::user()->is_admin || Auth::user()->manager) {
            $transactions = Transaction::orderBy('created_at', 'asc')
                            ->where('status', 1)
                            ->get();
        } else {
            //else transaction list of Auth user
            $transactions = Transaction::orderBy('created_at', 'asc')
                            ->where('user_id', Auth::user()->id)
                            ->where('status', 1)
                            ->get();
        }

        $pendingPayments = Transaction::orderBy('id', 'desc')
                            ->where('user_id', Auth::user()->id)
                            ->where('expiry_date', '>', now())
                            ->where('final_status', 0)
                            ->get();

        return view('dashboard.transactions.index', compact('transactions', 'pendingPayments'));
    }

    public function allocate(Request $request) {
        //dd($request->all());
        $transaction = Transaction::find($request->transaction_id);

        $plots = Plot::orderBy('id', 'asc')
        ->where('project_id', $transaction->project_id)
        ->where('allocation_status', 0)
        ->where('paid', 0)
        ->get();

        return view('dashboard.transactions.allocate', compact('transaction', 'plots'));
    }

    public function allocatePost(Request $request) {
        //dd($request->all());
        // Validate the request
        $request->validate([
            'plotNames' => 'required',
        ]);

        // Check if a file was uploaded
        //if ($request->hasFile('pdf')) {
            // Get the uploaded file
            //$uploadedFile = $request->file('pdf');

            // Generate a unique name for the file using a combination of timestamp and a random string
            //$uniqueFileName = time() . '_' . uniqid() . '.' . $uploadedFile->getClientOriginalExtension();

            // Move the uploaded file to the public folder with the unique name
            //$uploadedFile->move(public_path('pdfs'), $uniqueFileName);

            // Optionally, you may also want to store the unique name in the database for later reference
            // For example, if you have a 'pdfs' table with a 'filename' column, you can save it like this:
            // DB::table('pdfs')->insert(['filename' => $uniqueFileName]);

            // Now you can use $uniqueFileName to access the file later if needed
        //}
        //end


        $plots = $request->input('plots', []);
        $countPlotSelected = count($plots);

        $transaction = Transaction::find($request->transaction_id);

        if ($countPlotSelected > $transaction->plots) {
            return back()->withInput()->with('message', "Your selections are more than the plots the user subscribed for, Please review and and submit again.");
        }

        //Update transaction info
        $expiry_date = Carbon::now()->addDays(15);
        $transaction = Transaction::find($request->transaction_id);
        //count allocation and make sure plots are not above the the number
        $transaction->allocation_status = "Allocated";
        $transaction->expiry_date = $expiry_date->toDateString();
        $transaction->plotnames = $request->plotNames;
        $transaction->plot_id = $request->plot_id;
        $transaction->save();

        $plots = $request->input('plots', []);

        foreach ($plots as $plot) {
            $plot = Plot::find($plot);
            $plot->user_id = $transaction->user_id;
            $plot->allocation_status = 1;
            $plot->transaction_id = $transaction->id;
            $plot->available_after = $expiry_date->toDateString();
            $plot->save();
        }

        //send email
        ####
        //User info
        $clientEmail = $transaction->user->email;

        $clientName = $transaction->user->name;
        $clientAddress = $transaction->user->address;
        $clientCity = $transaction->user->city;
        $clientZip = $transaction->user->zip;

        //find the project details
        $project = Project::find($transaction->project_id);

        //plot info
        //Assign Plot infomation
        $plotName = $request->plotNames;
        $plotNumber = $request->plot_id;
        $projectAddress = $project->address;
        $projectState = $project->state;
        $projectName = $project->title;

        $compose = [
            'clientName' => $clientName,
            'clientAddress' =>$clientAddress,
            'clientCity' =>$clientCity,
            'clientZip' =>$clientZip,
            'plotName' =>$plotName,
            'plotNumber' =>$plotNumber,
            'projectAddress' =>$projectAddress,
            'projectState' =>$projectState,
            'projectName' =>$projectName,
        ];

        //send email
        Mail::to($clientEmail)->send(new PlotEmail($clientName, $clientAddress, $clientCity, $clientZip, $plotName, $plotNumber, $projectAddress, $projectState, $projectName));

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

    public function finalLandPayment(Request $request, $id) {
        $tx_ref = Paystack::genTranxRef();
        $amount = $request->amount;

        $data = array(
            "amount" => $amount * 100,
            "reference" => $tx_ref,
            "email" => Auth::user()->email,
            "currency" => "NGN",
            "callback_url" => "https://geohomesgroup.com/payment/land/callback/$id",
            //"callback_url" => "http://127.0.0.1:8000/payment/land/callback/$id",
        );

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }
}
