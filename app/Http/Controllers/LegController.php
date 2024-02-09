<?php

namespace App\Http\Controllers;

use App\Models\Leg; // Make sure to use your Leg model
use Illuminate\Http\Request;

class LegController extends Controller
{
    // Add a new leg to a trip
    public function store(Request $request)
    {
        $validated = $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'from_location' => 'required',
            'to_location' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'pax' => 'required|integer|min:1',
        ]);

        $leg = Leg::create($validated);
        return response()->json($leg, 201);
    }

    // Update an existing leg
    public function update(Request $request, $id)
    {
        $leg = Leg::findOrFail($id);
        $validated = $request->validate([
            'from_location' => 'required',
            'to_location' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'pax' => 'required|integer|min:1',
        ]);

        $leg->update($validated);
        return response()->json($leg);
    }

    // Delete a leg
    public function destroy($id)
    {
        $leg = Leg::findOrFail($id);
        $leg->delete();
        return response()->json(null, 204);
    }
}
