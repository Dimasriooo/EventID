<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Package;
use App\Models\User;


class BookingController extends Controller
{
    public function index() {
        $booking = DB::table('bookings')-> get();
        return view('pages.events.Booking.Booking', [
            "booking" => $booking
        ]);
    }

    public function create()
{
    $packages = Package::all(); // Semua data dari tabel 'packages'
    $users = User::all(); // Semua data dari tabel 'users'

    // Kirim data ke view
    return view('pages.events.Booking.create', compact('packages', 'users'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'event_date' => 'required|date',
        'status' => 'required|string',
        'total_price' => 'required|numeric',
        'additional_notes' => 'nullable|string',
        'packages_id' => 'required|integer',
        'user_id' => 'required|integer',
    ]);

    Booking::create($validated);
    return redirect()->route('booking.index')->with('success', 'Booking created successfully');
}

public function edit($id)
{
    $booking = Booking::findOrFail($id);
    $packages = Package::all(); // Ambil semua data package
    $users = User::all(); // Ambil semua data user

    return view('pages.events.booking.edit', compact('booking', 'packages', 'users'));
}



public function update(Request $request, $id)
{
    $validated = $request->validate([
        'event_date' => 'required|date',
        'status' => 'required|string',
        'total_price' => 'required|numeric',
        'additional_notes' => 'nullable|string',
        'packages_id' => 'required|integer',
        'user_id' => 'required|integer',
    ]);

    $booking = Booking::findOrFail($id);
    $booking->update($validated);
    return redirect()->route('booking.index')->with('success', 'Booking updated successfully');
}

public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();
    return redirect()->route('booking.index')->with('success', 'Booking deleted successfully');
}

}
