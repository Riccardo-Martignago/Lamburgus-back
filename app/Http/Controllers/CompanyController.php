<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Location;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display the registration view.
     */
        public function create(Request $request)
    {
        // Recuperiamo l'utente salvato nella sessione
        $locations = Location::all();
        $user = Auth::user();

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Devi essere autenticato per creare un’azienda.');
        }

        // Mostriamo il form di creazione delle aziende
        return view('company.create', compact('user', 'locations'));
    }

    public function store(Request $request)
    {
        // Validazione del form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:companies,email'],
            'phone_number' => ['required', 'digits:11'],
        ]);

        // Creazione della company e associazione con l'utente
        Company::create([
            'user_id' => Auth::id(),
            'location_id' => $request->location_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        // Reindirizzamento finale
        return redirect()->route('dashboard');
    }

}
