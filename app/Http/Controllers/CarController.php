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
