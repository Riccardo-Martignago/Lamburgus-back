<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\Car;
use App\Models\Location;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('booking.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('booking.show', compact('booking'));
    }

    public function create()
    {
        $users = User::all();
        $cars = Car::all();
        $locations = Location::all();
        return view('booking.create', compact('users', 'cars', 'locations'));
    }

    public function store(BookingRequest $request)
    {
        $booking = Booking::create($request->validated());
        return redirect()->route('booking.show', $booking->id)->with('success', 'Booking created successfully!');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $users = User::all();
        $cars = Car::all();
        $locations = Location::all();
        return view('booking.edit', compact('booking', 'users', 'cars', 'locations'));
    }

    public function update(BookingRequest $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->validated());
        return redirect()->route('booking.show', $booking->id)->with('success', 'Booking updated successfully!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->route('booking.index')->with('success', 'Booking deleted successfully!');
    }
}
