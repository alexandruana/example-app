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
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $this->validateCompany($request);
        Company::create($validatedData);

        return redirect()->route('companies.index')
                         ->with('success', 'Company registered successfully.');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $validatedData = $this->validateCompany($request);
        $company->update($validatedData);

        return redirect()->route('companies.index')
                         ->with('success', 'Company record updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')
                         ->with('success', 'Company record deleted successfully.');
    }

    protected function validateCompany(Request $request)
    {
        return $request->validate([
            'company_name' => 'required|string|max:255',
            'company_street' => 'required|string|max:255',
            'company_postcode' => 'required|string|max:255',
            'company_city' => 'required|string|max:255',
            'company_country' => 'required|string|max:255',
            'company_tax_id' => 'nullable|string|max:255',
            // 'client_id' => 'nullable|exists:clients,id', // Uncomment if applicable
        ]);
    }
}
