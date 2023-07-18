<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
