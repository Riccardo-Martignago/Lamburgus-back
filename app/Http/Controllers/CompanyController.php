<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display the registration view.
     */
    public function index()
    {
        $companies = Auth::user()->companies;
        $locations = Location::all()->keyBy('id');

        return view('company.index', compact('companies','locations'));
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        $location = Location::find($company->location_id);

        return view('company.show', compact('company', 'location'));
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

    public function edit ($id)
    {
        $locations = Location::all();
        $companies = Company::with('location')->findOrFail($id);
        return view('company.edit', compact('companies', 'locations'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255',
            'phone_number' => 'required|string|max:20',
        ]);

        $company = Company::findOrFail($id);
        $company->update($validated);

        return redirect()->route('company.index')->with('success', 'Company updated successfully.');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
    }
}
