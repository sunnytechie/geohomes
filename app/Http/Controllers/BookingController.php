<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Models\Booking;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function bookings() {
        $bookings = Booking::orderBy('id', 'desc')->get();

        return view('dashboard.booking.index', compact('bookings'));
    }

    public function show($building) {
        $building = Building::find($building);
        return view('snippets.home.booking', compact('building'));
    }

    public function store(Request $request, $id) {
        //validate
        //find building info
        $building = Building::find($id);

        //dd($request->all());

        $request->validate([
            'qtty' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'msg' => '',
        ]);        

        //store
        $booking = new Booking();
        $booking->building_id = $id;
        $booking->qtty = $request->qtty;
        $booking->location = $request->location;
        $booking->phone = $request->phone;
        $booking->address = $request->address;
        $booking->msg = $request->msg;
        $booking->save();

        //send email notification to admin
        $compose = [
            'title' => $building->title,
            'qtty' => $booking->qtty,
            'location' => $booking->location,
            'address' => $booking->address,
            'phone' => $booking->phone,
            'msg' => $booking->msg,
        ];

        $title = $building->title;
        $qtty = $booking->qtty;
        $location = $booking->location;
        $address = $booking->address;
        $phone = $booking->phone;
        $msg = $booking->msg;

        //send email
        $recipient = "nnam.ug@gmail.com";
        Mail::to($recipient)->send(new BookingMail($title, $qtty, $location, $address, $phone, $msg));
        //return
        return redirect()->route('booking.building.material.show', $building->id)->with('message', "Sent successfully. Kindly note that our customer relation officer will reach out to you soon. thank you.");
    }
}
