<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use App\Models\Project;
use App\Models\Transaction;
use App\Mail\FinalPaperMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Unicodeveloper\Paystack\Facades\Paystack;

class CallbackController extends Controller
{
    public function subscribe($project_id, $plot) {
        $paymentDetails = Paystack::getPaymentData();
        
        //dd($paymentDetails);

        //Get required details
        $amount = $paymentDetails['data']['amount'];
        $status = $paymentDetails['data']['status'];
        $reference = $paymentDetails['data']['reference'];
        $email = $paymentDetails['data']['customer']['email']; //Email of Auth user
        $order_id = $paymentDetails['data']['order_id'];
        $currency = $paymentDetails['data']['currency'];

        $transaction = new Transaction();
        $transaction->status = 1;
        $transaction->project_id = $project_id;
        $transaction->plots = $plot;
        $transaction->user_id = Auth::user()->id;
        $transaction->tx_ref = $reference;
        $transaction->save();

        return redirect()->route('transaction')->with('message', "Your payment was successful, Geohomes will allocate a plot to you shortly, thank you.");
    }

    public function finalLandCallback($id) {
        $paymentDetails = Paystack::getPaymentData();
        
        //dd($paymentDetails);

        //Get required details
        $amount = $paymentDetails['data']['amount'];
        $status = $paymentDetails['data']['status'];
        $reference = $paymentDetails['data']['reference'];
        $email = $paymentDetails['data']['customer']['email']; //Email of Auth user
        $order_id = $paymentDetails['data']['order_id'];
        $currency = $paymentDetails['data']['currency'];

        if ($status !== "success") {
            return back()->with('message', "Not found");
        }

        //find the transaction with the $id and update record
        $transaction = Transaction::find($id);
        $transaction->final_status = 1;
        $transaction->save();
        //dd($transaction);

        if ($transaction == null) {
            return back()->with('message', "Transaction error, please contact admin.");
        }

        //find the plots and update
        $plots = Plot::where('transaction_id', $id)->get();
        foreach ($plots as $plot) {
            $plot = Plot::find($plot->id);
            $plot->paid = 1;
            $plot->save();
        }

        //send final email
        //Client information
        $recipient = Auth::user()->email;
        $clientName = Auth::user()->name;
        $clientAddress = Auth::user()->address;
        $clientCity = Auth::user()->city;
        $clientZip = Auth::user()->zip;

        //find project details
        $project = Project::find($transaction->project_id);
        //dd($project);
        $projectName = $project->title;
        $projectAddress = $project->address;
        $projectState = $project->state;


        Mail::to($recipient)->send(new FinalPaperMail($recipient, $clientName, $clientAddress, $clientCity, $clientZip, $projectName, $projectAddress, $projectState));

        //return redirect
        return redirect()->route('transaction')->with('message', "You have successfully paid for the plot(s) allocated to you.");
    }
}
