<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $user_id = $request->session()->get('user_id');

        // Mostriamo il form di creazione delle aziende
        return view('company.create', compact('user_id'));
    }

    public function store(Request $request)
    {
        // Validazione del form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Company::class],
            'phone_number' => ['required', 'numeric', 'phone_number', 'size:11']
        ]);

        // Creazione della company e associazione con l'utente
        Company::create([
            'user_id' => $request->user_id,
            'location_id' => $request->location_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        // Reindirizzamento finale
        return redirect()->route('dashboard')->with('success', 'Company created successfully!');
    }

}
