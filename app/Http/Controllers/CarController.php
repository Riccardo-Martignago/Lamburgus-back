<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // Controlla se è stata passata una company_id nella query string
        if (!$request->has('company_id')) {
            return redirect()->back()->with('error', 'Nessuna azienda selezionata.');
        }

        $company_id = $request->company_id;

        // Trova l'azienda per verificare che esista
        $company = Company::findOrFail($company_id);

        // Filtra solo le macchine che appartengono a questa azienda
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

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'license_plate' => 'required|string|unique:cars,license_plate',
        ]);

        $car = Car::create($request->all());

        return redirect()->route('car.show', ['car' => $car->id])->with('success', 'Auto creata con successo!');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('car.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'license_plate' => 'required|string|unique:cars,license_plate,' . $id,
        ]);

        $car = Car::findOrFail($id);
        $car->update($request->all());

        return redirect()->route('car.show', ['car' => $car->id])->with('success', 'Auto aggiornata con successo!');
    }
}
