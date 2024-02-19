<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Add this line

use App\Models\Trip;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TripController extends Controller
{
    // List all trips
    public function index()
    {
        $trips = Trip::all(); // Fetch all trips from the database

        // Render the Inertia component and pass the trips data to it
        return Inertia::render('Trips', [
            'trips' => $trips
        ]);
    }

    // Show a single trip
    public function show(Trip $trip)
    {
        return Inertia::render('TripDetails', [
            'trip' => $trip
        ]);
    }

    // Create a new trip
    public function store(Request $request)
    {
        $validated = $request->validate([
            'passenger_id' => 'required',
            'start_date' => 'required|date',
            'routing' => 'required',
            'status' => 'required',
        ]);
    
        DB::beginTransaction();
    
        try {
            $trip = Trip::create($validated);
    
            // Generate unique_trip_id after creation and save the trip again
            $trip->unique_trip_id = $trip->generateUniqueTripIdUsingId($trip->id);
            $trip->save();
    
            // Handle legs if provided in the request
            if (!empty($request->legs)) {
                foreach ($request->legs as $legData) {
                    $trip->legs()->create([
                        'from_location' => strtoupper($legData['from_location']),
                        'to_location' => strtoupper($legData['to_location']),
                        'date' => $legData['date'],
                        'time' => $legData['time'],
                        'pax' => $legData['pax'],
                    ]);
                }
            }
    
            DB::commit();
            return response()->json($trip->load('legs'), 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Failed to create the trip: ' . $e->getMessage()], 500);
        }
    }

    // Assuming this function exists within your Trip model
    public function generateUniqueTripIdUsingId($id)
    {
        $datePart = now()->format('m-Y');
        return "{$datePart}/{$id}";
    }

    // Update an existing trip
    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);

        // Exclude unique_trip_id from the validation and update process
        $validated = $request->validate([
            'passenger_id' => 'required',
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
