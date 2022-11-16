<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display all the companies.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboards.administrator.companies.index', [
            'companies' => Company::paginate()
        ]);
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\View\View
     */
    public function create(Company $company)
    {
        return view('dashboards.administrator.companies.create', [
            'company' => $company,
        ]);
    }

    /**
     * Store a new company in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rfc' => ['required',
              'regex:/^[A-Z&Ñ]{3,4}[0-9]{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])[A-Z0-9]{2}[0-9]$/'
            ],
        ]);

        Company::create([
            'name' => $request->name,
            'rfc' => $request->rfc,
        ]);

        return redirect()->route('companies.index');
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  Company $company
     * @return \Illuminate\View\View
     */
    public function edit(Company $company)
    {
        return view('dashboards.administrator.companies.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required',
            'rfc' => ['required',
              'regex:/^[A-Z&Ñ]{3,4}[0-9]{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[01])[A-Z0-9]{2}[0-9]$/'
            ],
        ]);

        Company::whereId($company->id)->update([
            'name' => $request->name,
            'rfc' => $request->rfc
        ]);

        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return back();
    }
}
