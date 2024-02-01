<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\TravelDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TravelDocumentController extends Controller
{
    // Method to list travel documents for a specific passenger
    public function index(Passenger $passenger)
    {
        $documents = $passenger->travelDocuments; // Assuming Passenger has a travelDocuments() relationship
        return response()->json($documents);
    }

    // Method to store a new document
    public function store(Request $request, Passenger $passenger)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'country' => 'required|string',
            'number' => 'required|string',
            'expiry' => 'required|date',
            'isDefault' => 'nullable|boolean'
        ]);

        $document = $passenger->travelDocuments()->create($data);

        return response()->json($document, 201);
    }

    // Method to update a specific document
    public function update(Request $request, Passenger $passenger, TravelDocument $document)
    {
        $data = $request->validate([
            'type' => 'string',
            'country' => 'string',
            'number' => 'string',
            'expiry' => 'date',
            'isDefault' => 'nullable|boolean'
        ]);

        $document->update($data);

        return response()->json($document);
    }

    // Method to delete a document
    public function destroy(Passenger $passenger, TravelDocument $document)
    {
        $document->delete();

        return response()->json(['message' => 'Document deleted successfully']);
    }
}
