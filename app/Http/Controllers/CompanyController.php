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
    public function index()
    {
        $companies = Auth::user()->companies;

        return view('company.index', compact('companies'));
    }

        public function create(Request $request)
    {
        // data location and authenticated user
        $locations = Location::all();
        $user = Auth::user();

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be authenticated to create a company.');
        }

        return view('company.create', compact('user', 'locations'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:companies,email'],
            'phone_number' => ['required', 'digits:11'],
        ]);

        Company::create([
            'user_id' => Auth::id(),
            'location_id' => $request->location_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('dashboard');
    }

    public function edit (Company $companies)
    {
        return view('company.edit', compact('companies'));
    }
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);
        $company->update($validated);
        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }
}
