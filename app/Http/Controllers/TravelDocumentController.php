<?php

namespace App\Http\Controllers;

use App\Models\TravelDocument;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TravelDocumentController extends Controller
{
    /**
     * Display a listing of the travel documents for a specific passenger.
     *
     * @param  int  $passengerId
     * @return Response
     */
    public function index($passengerId)
    {
        $travelDocuments = TravelDocument::where('passenger_id', $passengerId)->get();
        return response()->json($travelDocuments);
    }

    /**
     * Store a newly created travel document in storage.
     *
     * @param  Request  $request
     * @param  int  $passengerId
     * @return Response
     */
    public function store(Request $request, $passengerId)
    {
        $validatedData = $request->validate([
            'country' => 'required|string',
            'document_number' => 'required|string',
            'issuing_date' => 'required|date',
            'expiry_date' => 'required|date',
            'isDefault' => 'required|boolean'
        ]);

        // Check if the new document is marked as default
        if ($validatedData['isDefault']) {
            // Check for existing default document
            $existingDefault = TravelDocument::where('passenger_id', $passengerId)
                                            ->where('isDefault', true)
                                            ->first();

            if ($existingDefault) {
                // Decide how to handle this scenario
                // E.g., make the existing document non-default
                $existingDefault->update(['isDefault' => false]);
            }
        }

        $travelDocument = new TravelDocument();
        $travelDocument->fill($validatedData);
        $travelDocument->passenger_id = $passengerId;
        $travelDocument->save();

        return response()->json($travelDocument, 201);
    }


    /**
     * Update the specified travel document in storage.
     *
     * @param  Request  $request
     * @param  int  $passengerId
     * @param  int  $documentId
     * @return Response
     */
    public function update(Request $request, $passengerId, $documentId)
    {
        $validatedData = $request->validate([
            'country' => 'required|string',
            'document_number' => 'required|string',
            'issuing_date' => 'required|date',
            'expiry_date' => 'required|date',
            'isDefault' => 'required|boolean'
        ]);

        $travelDocument = TravelDocument::where('passenger_id', $passengerId)
                                         ->findOrFail($documentId);
        $travelDocument->update($validatedData);

        return response()->json($travelDocument);
    }

    /**
     * Remove the specified travel document from storage.
     *
     * @param  int  $passengerId
     * @param  int  $documentId
     * @return Response
     */
    public function destroy($passengerId, $documentId)
    {
        $travelDocument = TravelDocument::where('passenger_id', $passengerId)
                                         ->findOrFail($documentId);
        $travelDocument->delete();

        return response()->json(null, 204); // 204 No Content
    }
}
