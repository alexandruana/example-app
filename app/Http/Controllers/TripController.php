<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip; // Make sure you have a Trip model
use Inertia\Inertia;

class TripController extends Controller
{
    // Display a list of all trips
    public function index()
    {
        $trips = Trip::all(); // Fetch all trips from the database

        return Inertia::render('Trips', [
            'trips' => $trips,
        ]);
    }

    // Show a form for creating a new trip
    public function create()
    {
        // Return a view for creating a new trip
        return Inertia::render('TripCreate');
    }

    // Store a newly created trip in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|integer',
            'trip_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|string'
        ]);

        $trip = Trip::create($validated);

        // Return a JSON response or Inertia response
        return response()->json(['message' => 'Trip created successfully', 'trip' => $trip]);
    }

    // Display a specific trip
    public function show(Trip $trip)
    {
        return Inertia::render('TripShow', [
            'trip' => $trip,
        ]);
    }

    // Show a form for editing a specific trip
    public function edit(Trip $trip)
    {
        return Inertia::render('TripEdit', [
            'trip' => $trip,
        ]);
    }

    // Update a specific trip in the database
    public function update(Request $request, Trip $trip)
    {
        // Validate the request...
        $validated = $request->validate([
            // Add validation rules here
            'passenger_id' => 'required|integer',
            'trip_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|string'
        ]);

        $trip->update($validated);

        // Redirect after updating the trip
        return redirect()->route('trips.index');
    }

    // Delete a specific trip
    public function destroy(Trip $trip)
    {
        $trip->delete();

        // Redirect after deleting the trip
        return redirect()->route('trips.index');
    }
}
