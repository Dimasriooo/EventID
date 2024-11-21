<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Return bookings
        return response()->json([
            'bookings' => Booking::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'UsersID' => 'required|exists:users,UsersID',
            'Packages_id' => 'required|exists:packages,Packages_id',
            'event_date' => 'required|date',
            'total_price' => 'required|numeric',
            'status' => 'in:pending,confirmed,completed',
            'additional_notes' => 'nullable'
        ]);


        $booking = Booking::create($validatedData);
        return response()->json(['message'=> 'Booking created successfully', 'data' => $booking], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::with(['user', 'package'])->findOrFail($id);
        return response()->json($booking);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);
        $validatedData = $request->validate([
            'event_date' => 'sometimes|date',
            'total_price' => 'sometimes|numeric',
            'status' => 'sometimes|in:pending,confirmed,completed',
            'additional_notes' => 'nullable'
        ]);

        $booking->update($validatedData);
        return $booking;

        return response()->json(['message' => 'Booking updated successfully', 'data' => $booking]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
