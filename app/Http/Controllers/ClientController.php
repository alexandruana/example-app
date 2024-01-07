<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:255',
            'doc_type' => 'sometimes|string|max:255',
            'doc_number' => 'sometimes|string|max:20',
            'doc_expiry' => 'sometimes|date',
            'company_id' => 'nullable|max:255'
        ]);
        Client::create($validatedData);
        return redirect()
            ->route('clients.index')
            ->with('success', 'Client registered successfully.');
    }

    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit.edit', compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'nationality' => 'required|string|max:255',
            'doc_type' => 'sometimes|string|max:255',
            'doc_number' => 'sometimes|string|max:20',
            'doc_expiry' => 'sometimes|date',
            'company_id' => 'nullable|max:255'
        ]);
        $client->update($validatedData);
        return redirect()
            ->route('clients.index')
            ->with('success', 'Client record updated successfully.');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client record deleted successfully.');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('client_account', compact('client'));
    }
}
