<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Company;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->has('company_id')) {
            return redirect()->back()->with('error', 'Company not found.');
        }

        $company_id = $request->company_id;

        $company = Company::findOrFail($company_id);

        $cars = Car::where('company_id', $company_id)->paginate(10);

        return view('car.index', compact('cars', 'company'));
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('car.show', compact('car'));
    }

    public function create(Request $request)
    {
        $selectedCompany = $request->has('company_id') ? Company::findOrFail($request->company_id) : null;

        return view('car.create', compact('selectedCompany'));
    }

    public function store(CarRequest $request)
    {
        $car = Car::create($request->all());

        return redirect()->route('car.show', ['car' => $car->id])->with('success', 'New car added!');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('car.edit', compact('car'));
    }

    public function update(CarRequest $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());

        return redirect()->route('car.show', ['car' => $car->id])->with('success', 'Car update successful!');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('car.index', ['company_id' => $car->company_id])->with('success', 'Car delete successful!');
    }
}
