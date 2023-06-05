<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inspectiontransaction;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
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

            //return to escrow dashboard
            //dd('completed');
            return redirect()->route('schedule')->with('message', "Your payment was successful, Geohomes will schedule inspection date with you shortly, thank you.");
        }

        
    }

    public function subscription(Request $request) {
        //dd($request->all());
        $tx_ref = Paystack::genTranxRef();
        $transaction = new Transaction();
        $transaction->project_id = $request->project_id;
        $transaction->user_id = Auth::user()->id;
        $transaction->tx_ref = $tx_ref;
        $transaction->save();

        $data = array(
            "amount" => 20000 * 100,
            "reference" => $tx_ref,
            "email" => Auth::user()->email,
            "currency" => "NGN",
            "orderID" => now(),
        );
    
    return Paystack::getAuthorizationUrl($data)->redirectNow();
    }

    public function agent() {
        $data = array(
            "amount" => 10000 * 100,
            "reference" => Paystack::genTranxRef(),
            "email" => Auth::user()->email,
            "currency" => "NGN",
            "orderID" => Auth::user()->id,
        );
    
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