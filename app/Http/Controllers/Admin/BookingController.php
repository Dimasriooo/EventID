<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookingController extends Controller
{
    public function Book() {
        $booking = DB::table('bookings')-> get();
        return view('pages.events.Booking', [
            "booking" => $booking
        ]);
    }
}
