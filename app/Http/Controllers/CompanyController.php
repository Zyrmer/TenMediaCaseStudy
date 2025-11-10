<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy("id","desc")->paginate(10);
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
        ]);

        Company::create(attributes: $request->all());

        return redirect()->route('companies.index')->with('success', 'Unternehmen created successfully!');
    }

    public function show(Company $company)
    {
        return view('companies.show', ['company' => $company]);
    }


    public function edit(Company $company)
    {
        
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'website' => 'nullable',
        ]);

        $company->update([
            'name' => $request->name,
            'description' => $request->description,
            'website' => $request->website,
        ]);

        return redirect()->route('companies.index')->with('success', 'Unternehmen updated successfully!');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Unternehmen deleted successfully!');
    }

}
