<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Passenger;

class PassengerController extends Controller
{
    public function index()
    {
        $passengers = Passenger::all(); // Fetch all passengers
        return Inertia::render('Passengers', [
            'passengers' => $passengers
        ]);
    }

    public function create()
    {
        return Inertia::render('Passengers/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:255',
            'isCharterer' => 'nullable|boolean',
            'company_id' => 'nullable|max:255'
        ]);

        $passenger = Passenger::create($validatedData);

        return $request->wantsJson()
                    ? new JsonResponse($passenger, 201)
                    : redirect()->route('passengers.index');
    }

    public function show($id)
    {
        $passenger = Passenger::findOrFail($id);
        return Inertia::render('Passengers/Show', ['passenger' => $passenger]);
    }

    public function edit($id)
    {
        $passenger = Passenger::findOrFail($id);
        return Inertia::render('Passengers/Edit', ['passenger' => $passenger]);
    }

    public function update(Request $request, $id)
    {
        $passenger = Passenger::findOrFail($id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|max:255',
            'last_name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:255',
            'isCharterer' => 'nullable|boolean',
            'company_id' => 'nullable|max:255'
        ]);

        $passenger->update($validatedData);

        return $request->wantsJson()
                    ? new JsonResponse($passenger)
                    : redirect()->route('passengers.index');
    }

    public function destroy($id)
    {
        $passenger = Passenger::findOrFail($id);
        $passenger->delete();

        return request()->wantsJson()
                    ? new JsonResponse(['message' => 'Passenger deleted.'])
                    : redirect()->route('passengers.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $passengers = Passenger::where('last_name', 'like', "%{$query}%")->get();
        return $request->wantsJson()
                    ? new JsonResponse($passengers)
                    : Inertia::render('Passengers/Index', ['passengers' => $passengers]);
    }
}
