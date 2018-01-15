<?php

namespace App\Http\Controllers;

use App\Models\SchedulledBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchedulledBookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookings = SchedulledBooking::where(['user' => Auth::user()->username])->orderBy('date', 'ASC')->orderBy('time', 'ASC')->get();

        return view('schedulledbookings', compact(['bookings']));
    }

    public function delete(SchedulledBooking $booking)
    {
        if ($booking->user != Auth::user()->username) {
            flash('You did not make that schedulled booking...')->error();

            return redirect(action('SchedulledBookingsController@index'));
        }

        $booking->delete();
        flash('Deleted Schedulled Booking');

        return redirect(action('SchedulledBookingsController@index'));
    }

    public function setRecuring(Request $request)
    {
        $booking = SchedulledBooking::find($request->id);
        
        if ($booking->user == Auth::user()->username) {
            $booking->recurring = $request->checked ? 1 : 0;
            $booking->save();
        }

        // It's for ajax requests, but i guess we have to return something
        return \Redirect::back();
    }
}
