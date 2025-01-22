<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera tutte le location
        $locations = Location::all();

        // Passa i dati alla vista principale di locations
        return view('locations.index', compact('locations'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     // Mostra il form per creare una nuova location
    //     return view('locations.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     // Valida i dati ricevuti
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //     ]);

    //     // Crea una nuova location nel database
    //     Location::create($validated);

    //     // Reindirizza con un messaggio di successo
    //     return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Location $location)
    // {
    //     // Mostra i dettagli di una location specifica
    //     return view('locations.show', compact('location'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Location $location)
    // {
    //     // Mostra il form per modificare una location
    //     return view('locations.edit', compact('location'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Location $location)
    // {
    //     // Valida i dati ricevuti
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //     ]);

    //     // Aggiorna la location nel database
    //     $location->update($validated);

    //     // Reindirizza con un messaggio di successo
    //     return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Location $location)
    // {
    //     // Elimina la location dal database
    //     $location->delete();

    //     // Reindirizza con un messaggio di successo
    //     return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    // }
}
