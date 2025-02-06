<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $companyIds = $user->companies->pluck('id');

        $cars = Car::whereIn('company_id', $companyIds)->paginate(10);

        return view('car.index', compact('cars'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('car.create', compact('companies'));
    }

    /**
     * Salva una nuova auto nel database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'license_plate' => 'required|string|unique:cars,license_plate',
        ]);

        Car::create($request->all());

        return redirect()->route('car.index')->with('success', 'Auto creata con successo!');
    }
}
