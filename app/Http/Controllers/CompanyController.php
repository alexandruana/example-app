<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the companies for a specific passenger.
     *
     * @param  int  $passengerId
     * @return Response
     */
    public function index($passengerId)
    {
        $companies = Company::where('passenger_id', $passengerId)->get();
        return response()->json($companies);
    }

    public function create()
    {
        return view('companies.create');
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
            'company_name' => 'required|string',
            'company_street' => 'required|string',
            'company_postcode' => 'required|string',
            'company_city' => 'required|string',
            'company_country' => 'required|string',
            'company_tax_id' => 'nullable|string'
        ]);

        $company = new Company();
        $company->fill($validatedData);
        $company->passenger_id = $passengerId;
        $company->save();

        return response()->json($company, 201);
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified travel document in storage.
     *
     * @param  Request  $request
     * @param  int  $passengerId
     * @param  int  $companyId
     * @return Response
     */
    public function update(Request $request, $passengerId, $companyId)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string',
            'company_street' => 'required|string',
            'company_postcode' => 'required|string',
            'company_city' => 'required|string',
            'company_country' => 'required|string',
            'company_tax_id' => 'nullable|string'
        ]);
        
        $company = Company::where('passenger_id', $passengerId)
                            ->findOrFail($companyId);
        $company->update($validatedData);

        return response()->json($company);
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
