<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalPlan;
use App\Http\Requests\RentalPlansRequest;
use App\Models\Location;
use App\Models\Car;

class RentalPlanController extends Controller
{
    /**
     * Display a listing of rental plans.
     */
    public function index(Request $request)
    {
        if (!$request->has('car_id')) {
            return redirect()->back()->with('error', 'Car not found.');
        }

        $car_id = $request->car_id;

        $car = car::findOrFail($car_id);

        $rentalPlans = RentalPlan::where('car_id', $car_id)->paginate(10);

        $locations = Location::all();

        return view('rental-plan.index', compact('rentalPlans', 'locations', 'car'));
    }

    /**
     * Show the form for creating a new rental plan.
     */
    public function create(Request $request)
    {
        $locations = Location::all();
        $selectedCar = $request->has('car_id') ? Car::findOrFail($request->car_id) : null;

        return view('rental-plan.create', compact('selectedCar', 'locations'));
    }

    /**
     * Store a newly created rental plan.
     */
    public function store(RentalPlansRequest $request)
    {

        $rentalPlan = RentalPlan::create($request->validated());

        return redirect()->route('rental-plan.show',['rental_plan' => $rentalPlan->id])->with('success', 'Rental plan created successfully!');
    }

    /**
     * Display the specified rental plan.
     */
    public function show($id)
    {
        $rentalPlan = RentalPlan::with(['car', 'location'])->findOrFail($id);
        return view('rental-plan.show', compact('rentalPlan'));
    }

    /**
     * Show the form for editing the specified rental plan.
     */
    public function edit($id)
    {
        $rentalPlan = RentalPlan::findOrFail($id);
        $cars = Car::all();
        $locations = Location::all();
        return view('rental-plan.edit', compact('rentalPlan', 'cars', 'locations'));
    }

    /**
     * Update the specified rental plan.
     */
    public function update(Request $request, $id)
    {
        $rentalPlan = RentalPlan::findOrFail($id);
        $rentalPlan->update($request->validated());

        return redirect()->route('rental-plan.show', $rentalPlan->id)->with('success', 'Rental plan updated successfully!');
    }

    public function destroy($id)
    {
        $rentalPlan = RentalPlan::findOrFail($id);
        $rentalPlan->delete();

        return redirect()->route('rental-plan.index')->with('success', 'Rental Plan deleted successfully.');
    }

}
