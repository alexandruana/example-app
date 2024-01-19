<?php
namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\TravelDocument;
use App\Models\Passenger;
use Illuminate\Http\Request;

class TravelDocumentController extends Controller
{
    // Display a listing of travel documents for a specific passenger
    public function index($passengerId)
    {
        $passenger = Passenger::with('travelDocuments')->findOrFail($passengerId);

        // Debugging: Inspect the passenger data
        \Log::debug('Passenger with travel documents', $passenger->toArray());


        return Inertia::render('TravelDocuments/Index', [
            'passenger' => $passenger,
            // The travelDocuments are now included with the passenger, so no need to send separately
        ]);
    }

    // Show the form for creating a new travel document for a specific passenger
    public function create($passengerId)
    {
        return Inertia::render('TravelDocuments/Create', [
            'passengerId' => $passengerId
        ]);
    }

    // Store a newly created travel document in storage for a specific passenger
    public function store(Request $request, $passengerId)
    {
        $request->validate([
            'country' => 'required|string',
            'document_number' => 'required|string',
            'issuing_date' => 'required|date',
            'expiry_date' => 'required|date'
        ]);

        $passenger = Passenger::findOrFail($passengerId);
        $passenger->travelDocuments()->create($request->all());

        return redirect()->route('travelDocuments.index', ['passenger' => $passengerId]);
    }

    // Display the specified travel document
    public function show($passengerId, $documentId)
    {
        $travelDocument = TravelDocument::where('passenger_id', $passengerId)
                                        ->findOrFail($documentId);

        return Inertia::render('TravelDocuments/Show', [
            'travelDocument' => $travelDocument
        ]);
    }

    // Show the form for editing the specified travel document
    public function edit($passengerId, $documentId)
    {
        $travelDocument = TravelDocument::where('passenger_id', $passengerId)
                                        ->findOrFail($documentId);

        return Inertia::render('TravelDocuments/Edit', [
            'travelDocument' => $travelDocument
        ]);
    }

    // Update the specified travel document in storage
    public function update(Request $request, $passengerId, $documentId)
    {
        $request->validate([
            'country' => 'required|string',
            'document_number' => 'required|string',
            'issuing_date' => 'required|date',
            'expiry_date' => 'required|date'
        ]);

        $travelDocument = TravelDocument::where('passenger_id', $passengerId)
                                        ->findOrFail($documentId);
        $travelDocument->update($request->all());

        return redirect()->route('travelDocuments.index', ['passenger' => $passengerId]);
    }

    // Remove the specified travel document from storage
    public function destroy($passengerId, $documentId)
    {
        $travelDocument = TravelDocument::where('passenger_id', $passengerId)
                                        ->findOrFail($documentId);
        $travelDocument->delete();

        return redirect()->route('travelDocuments.index', ['passenger' => $passengerId]);
    }
}
