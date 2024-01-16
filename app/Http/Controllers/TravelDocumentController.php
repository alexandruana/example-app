<?php

namespace App\Http\Controllers;

use App\Models\TravelDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class TravelDocumentController extends Controller
{
    /**
     * Display a listing of the travel documents.
     */
    public function index()
    {
        $travelDocuments = TravelDocument::all();
        return Inertia::render('TravelDocuments/Index', ['travelDocuments' => $travelDocuments]);
    }

    /**
     * Store a newly created travel document in storage.
     */
    public function store(Request $request)
    {
        Log::info('Storing new travel document', ['request_data' => $request->all()]);

        try {
            $validatedData = $request->validate([
                'passenger_id' => 'required|exists:passengers,id',
                'country' => 'required|string|max:255',
                'document_number' => 'required|string|max:255',
                'issuing_date' => 'required|date',
                'expiry_date' => 'required|date|after:issuing_date',
                'isPrimary' => 'required|boolean',
            ]);
            
            $travelDocument = TravelDocument::create($validatedData);
            return redirect()->back()->with('message', 'Travel Document Created Successfully.');

        } catch (\Exception $e) {
            Log::error('Error storing travel document', ['error' => $e->getMessage()]);
            // Handle the error appropriately
        }
    }

    /**
     * Update the specified travel document in storage.
     */
    public function update(Request $request, TravelDocument $travelDocument)
    {
        Log::info('Updating travel document', ['request_data' => $request->all(), 'travel_document_id' => $travelDocument->id]);

        try {
            $validatedData = $request->validate([
                'country' => 'required|string|max:255',
                'document_number' => 'required|string|max:255',
                'issuing_date' => 'required|date',
                'expiry_date' => 'required|date|after:issuing_date',
                'isPrimary' => 'required|boolean',
            ]);
            $travelDocument->update($validatedData);
            return redirect()->back()->with('message', 'Travel Document Updated Successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating travel document', ['error' => $e->getMessage()]);
            // Handle the error appropriately
        }
    }

    /**
     * Remove the specified travel document from storage.
     */
    public function destroy(TravelDocument $travelDocument)
    {
        $travelDocument->delete();
        return redirect()->back()->with('message', 'Travel Document Deleted Successfully.');
    }
}
