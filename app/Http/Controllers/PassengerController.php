<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Passenger;

class PassengerController extends Controller
{
    public function index()
    {
        $passengers = Passenger::all();
        return view('passengers.index', compact('passengers'));
    }

    public function create()
    {
        return view('passengers.create.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:255',
            'isCharterer' => 'boolean',
            'company_id' => 'nullable|max:255'
        ]);
        Passenger::create($validatedData);
        return redirect()
            ->route('passengers.index')
            ->with('success', 'Passenger registered successfully.');
    }

    public function edit(string $id)
    {
        $passenger = Passenger::findOrFail($id);
        return view('passengers.edit.edit', compact('passenger'));
    }

    public function update(Request $request, string $id)
    {
        $passenger = Passenger::findOrFail($id);
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:255',
            'isCharterer' => 'boolean',
            'company_id' => 'nullable|max:255'
        ]);
        $passenger->update($validatedData);
        return redirect()
            ->route('passengers.index')
            ->with('success', 'Passenger record updated successfully.');
    }

    public function destroy(string $id)
    {
        $passenger = Passenger::findOrFail($id);
        $passenger->delete();
        return redirect()->route('passengers.index')->with('success', 'Passenger record deleted successfully.');
    }

    public function show($id)
    {
        $passenger = Passenger::with('company')->findOrFail($id);
        return view('passengers.passenger_account', compact('passenger'));
    }
}
