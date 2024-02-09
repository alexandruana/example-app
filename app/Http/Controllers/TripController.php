<?php

namespace App\Http\Controllers;

use App\Models\Trip; // Make sure to use your Trip model
use Illuminate\Http\Request;
use Inertia\Inertia;


class TripController extends Controller
{
    // List all trips
    public function index()
    {
        $trips = Trip::all(); // Fetch all trips from the database

        return Inertia::render('Trips', [
            'trips' => $trips,
        ]);
    }

    // Show a single trip
    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        return response()->json($trip);
    }

    // Create a new trip
    public function store(Request $request)
    {
        $validated = $request->validate([
            'passenger_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'start_date' => 'required|date',
            'routing' => 'required',
            'status' => 'required',
        ]);

        $trip = Trip::create($validated);
        return response()->json($trip, 201);
    }

    // Update an existing trip
    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $validated = $request->validate([
            'passenger_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'start_date' => 'required|date',
            'routing' => 'required',
            'status' => 'required',
        ]);

        $trip->update($validated);
        return response()->json($trip);
    }

    // Delete a trip
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();
        return response()->json(null, 204);
    }
}
