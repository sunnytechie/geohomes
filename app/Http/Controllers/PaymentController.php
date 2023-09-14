<?php

namespace App\Http\Controllers;

use App\Models\Agent;

use App\Http\Requests;
use App\Models\Client;
use App\Models\Transaction;
use App\Models\Pendingagent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Inspectiontransaction;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        //dd($paymentDetails);

        //Get required details
        $amount = $paymentDetails['data']['amount'];
        $status = $paymentDetails['data']['status'];
        $reference = $paymentDetails['data']['reference'];
        $email = $paymentDetails['data']['customer']['email']; //Email of Auth user
        $order_id = $paymentDetails['data']['order_id'];
        $currency = $paymentDetails['data']['currency'];

        $checkTransactionTable = Transaction::where('tx_ref', $reference)->first();
        $checkInspectiontransactionTable = Inspectiontransaction::where('tx_ref', $reference)->first();
        $checkPendingAgent = Pendingagent::where('tx_ref', $reference)->first();

        if ($checkTransactionTable != NULL) {
            //update transaction from table
            $transaction = Transaction::find($checkTransactionTable->id);
            $transaction->status = 1;
            $transaction->save();

            //return to escrow dashboard
            //dd('completed');
            return redirect()->route('transaction')->with('message', "Your payment was successful, Geohomes will allocate a plot to you shortly, thank you.");
        }

        if ($checkInspectiontransactionTable != NULL) {
            //update transaction from table
            $transaction = Inspectiontransaction::find($checkInspectiontransactionTable->id);
            $transaction->status = 1;
            $transaction->save();

            return redirect()->route('schedule')->with('message', "Your payment was successful, Geohomes will schedule inspection date with you shortly, thank you.");
        }

        if ($checkPendingAgent != NULL) {
            //update agent details
            $agent = Agent::where('user_id', Auth::user()->id)->first();
            $agent->subscribed = 1;
            $agent->save();

            //delete pending
            $pending = Pendingagent::find($checkPendingAgent->id);
            $pending->delete();

            return redirect()->route('dashboard.index')->with('message', "Your payment was successful, You can now post more properties in Geohomes, thank you.");
        }


    }

    public function subscription(Request $request) {
        //dd($request->all());
        $tx_ref = Paystack::genTranxRef();

        //Save client details if it an agent
        if (Auth::user()->is_agent == 1) {
            //validate request
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'state' => 'required',
                'zip' => 'required',
                'country' => 'required',
            ]);

            //save client details
            $client = new Client();
            $client->name = $request->name;
            $client->email = $request->email;
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->state = $request->state;
            $client->zip = $request->zip;
            $client->country = $request->country;
            $client->tx_ref = $tx_ref;
            $client->project_id = $request->project_id;
            $client->save();
        }


        $project = $request->project_id;
        $plots = $request->plots;

        $data = array(
            "amount" => 20000 * 100,
            "reference" => $tx_ref,
            "email" => Auth::user()->email,
            "currency" => "NGN",
            "callback_url" => "https://geohomesgroup.com/payment/subscriber/callback/$project/$plots",

        );

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }

    public function agent() {

        //dd('wait first');

        //$agent = Agent::where('user_id', Auth::user()->id)->first();
        //dd($agent);
        $tx_ref = Paystack::genTranxRef();

        $data = array(
            "amount" => 10000 * 100,
            "reference" => $tx_ref,
            "email" => Auth::user()->email,
            "currency" => "NGN",
            "orderID" => Auth::user()->id,
        );

        //save data in agent pending
        $pending = new Pendingagent();
        $pending->user_id = Auth::user()->id;
        $pending->tx_ref = $tx_ref;
        $pending->save();

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }


    public function inspection(Request $request) {
        $tx_ref = Paystack::genTranxRef();
        $transaction = new Inspectiontransaction();
        $transaction->project_id = $request->project_id;
        $transaction->user_id = Auth::user()->id;
        $transaction->tx_ref = $tx_ref;
        $transaction->save();

        $data = array(
            "amount" => 10000 * 100,
            "reference" => $tx_ref,
            "email" => Auth::user()->email,
            "currency" => "NGN",
            "orderID" => now(),
        );

        return Paystack::getAuthorizationUrl($data)->redirectNow();
    }
}
