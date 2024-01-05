<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create.create');
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_street' => 'required|string|max:255',
            'company_postcode' => 'required|string|max:255',
            'company_city' => 'required|string|max:255',
            'company_country' => 'required|string|max:255',
            'company_tax_id' => 'string|max:255',
            'client_id' => 'nullable|exists:clients,id',
        ]);
        Company::create($validatedData);
        return redirect()
            ->route('companies.index')
            ->with('success', 'Company registered successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::findOrFail($id);
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_street' => 'required|string|max:255',
            'company_postcode' => 'required|string|max:255',
            'company_city' => 'required|string|max:255',
            'company_country' => 'required|string|max:255',
            'company_tax_id' => 'required|string|max:255',
        ]);
        $company->update($validatedData);
        return redirect()
            ->route('companies.index')
            ->with('success', 'Company record updated successfully.');
    }

    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company record deleted successfully.');
    }
}
