<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return response()->json($bookings);
    }

    public function show($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }
        return response()->json($booking);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'pickup_location_id' => 'required|exists:locations,id',
            'dropoff_location_id' => 'required|exists:locations,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_price' => 'required|numeric'
        ]);

        $booking = Booking::create($validatedData);
        return response()->json($booking, 201);
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $validatedData = $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'pickup_location_id' => 'sometimes|exists:locations,id',
            'dropoff_location_id' => 'sometimes|exists:locations,id',
            'car_id' => 'sometimes|exists:cars,id',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after:start_date',
            'total_price' => 'sometimes|numeric'
        ]);

        $booking->update($validatedData);
        return response()->json($booking);
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }
}
