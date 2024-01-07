<?php

namespace App\Http\Controllers;

use App\Models\Plot;
use App\Models\Client;
use App\Models\Earning;
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

        if (Auth::user()->is_agent == 1) {
            //update client table where tx_ref = $reference
            $client = Client::where('tx_ref', $reference)->first();
            $client->transaction_id = $transaction->id;
            $client->save();

            //update transaction table
            $transaction = Transaction::find($transaction->id);
            $transaction->agent = 1;
            $transaction->client_id = $client->id;
            $transaction->save();

            //send email to client
        } else {
            // send email auth user
        }

        return redirect()->route('transaction')->with('message', "Your payment was successful, FBILTD will allocate a plot to you shortly, thank you.");
    }

    public function subscribeAgent($project_id, $plot, $client) {
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

        return redirect()->route('transaction')->with('message', "Your payment was successful, FBILTD will allocate a plot to you shortly, thank you.");
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
        $transaction->updated_at = now();
        $transaction->land_tx_ref = $reference;
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
        if (Auth::user()->is_customer == 1) {
            $recipient = Auth::user()->email;
            $clientName = Auth::user()->name;
            $clientAddress = Auth::user()->address;
            $clientCity = Auth::user()->city;
            $clientZip = Auth::user()->zip;
        }
        else {
            $client = Client::find($transaction->client_id);
            $recipient = $client->email;
            $clientName = $client->name;
            $clientAddress = $client->address;
            $clientCity = $client->state;
            $clientZip = $client->zip;
        }

        //find project details
        $project = Project::find($transaction->project_id);
        //dd($project);
        $projectName = $project->title;
        $projectAddress = $project->address;
        $projectState = $project->state;


        Mail::to($recipient)->send(new FinalPaperMail($recipient, $clientName, $clientAddress, $clientCity, $clientZip, $projectName, $projectAddress, $projectState));

        //calculate 20% of $project->price
        $amount = $project->price * 0.2;
        //make enearings for user or update user earnings
        $eanning = Earning::where('user_id', Auth::user()->id)->first();
        if ($eanning == null) {
            $eanning = new Earning();
            $eanning->user_id = Auth::user()->id;
            $eanning->amount = $amount;
            $eanning->save();
        } else {
            $eanning = Earning::find($eanning->id);
            $eanning->amount = $eanning->amount + $amount;
            $eanning->save();
        }

        //return redirect
        return redirect()->route('transaction')->with('message', "You have successfully paid for the plot(s) allocated to you.");
    }
}
