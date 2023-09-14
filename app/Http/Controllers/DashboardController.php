<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Earning;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\Property;
use App\Models\Destination;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inspectiontransaction;

class DashboardController extends Controller
{
    public function index() {
        $properties = Property::where('user_id', Auth::user()->id)->get();
        if (Auth::user()->is_admin) {
            $transactions = Transaction::where('status', 1)->get();
            $inspections = Inspectiontransaction::where('status', 1)->get();
        } else {
            $transactions = Transaction::where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->get();
            $inspections = Inspectiontransaction::where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->get();
        }

        $projects = Project::all();
        $agents = Agent::all();
        $destinations = Destination::all();

        // Your logic to fetch data from the database
        $successTran = Transaction::where('status', 1)->get();
        $failedTran = Transaction::where('status', 0)->get();
        $successInsptTran = Inspectiontransaction::where('status', 1)->get();
        $failedInsptTran = Inspectiontransaction::where('status', 0)->get();
        $subscribedAgent = Agent::where('subscribed', 1)->get();
        $data = [
            'Successful transactions' => $successTran->count(),
            'Unsuccessful/Pending transactions' => $failedTran->count(),
            'Successful Paid Inspection' => $successInsptTran->count(),
            'Pending/Unsuccessful Inspection' => $failedInsptTran->count(),
            'Successful Agent Upgrade' => $subscribedAgent->count(),
        ];

        $labels = json_encode(array_keys($data));
        $values = json_encode(array_values($data));

        $pendingPayments = Transaction::orderBy('id', 'desc')
                            ->where('user_id', Auth::user()->id)
                            ->where('expiry_date', '>', now())
                            ->where('final_status', 0)
                            ->get();

        $earning = Earning::where('user_id', Auth::user()->id)->first();
        if ($earning == NULL) {
            $earning = 0;
        } else {
            $earning = $earning->amount;
        }

        return view('dashboard.index', compact('properties', 'earning', 'pendingPayments', 'labels', 'values', 'transactions', 'inspections', 'projects', 'agents', 'destinations'));
    }

    public function status() {
        return view('dashboard.unapproved');
    }

    public function unApproved() {
        $agents = Agent::orderBy('id', 'desc')
            ->where('approval', 'pending')->get();
        return view('dashboard.agent.unapproved', compact('agents'));
    }

    public function approve($id) {
        $agent = Agent::find($id);
        $agent->approval = "approved";
        $agent->save();

        return back()->with('message', "approved successfully.");
    }
}
