<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\InvoiceStatus;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboards.sales.invoices.index', [
            'invoices' => Invoice::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Invoice $invoice)
    {
        $companies = Company::all();
        $statuses = InvoiceStatus::all();

        return view('dashboards.sales.invoices.create', [
            'invoice' => $invoice,
            'companies' => $companies,
            'statuses' => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required',
            'status' => '',
            'delivery_address' => 'required'
        ]);

        Invoice::create([
            'company_id' => $request->company,
            'invoice_status_id' => $request->status,
            'total' => 0,
            'delivery_address' => $request->delivery_address
        ]);

        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $companies = Company::all();
        $statuses = InvoiceStatus::all();

        return view('dashboards.sales.invoices.edit', [
            'invoice' => $invoice,
            'companies' => $companies,
            'statuses' => $statuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'company' => 'required',
            'status' => '',
            'delivery_address' => 'required'
        ]);

        Invoice::whereId($invoice->id)->update([
            'company_id' => $request->company,
            'invoice_status_id' => $request->status,
            'delivery_address' => $request->delivery_address
        ]);

        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return back();
    }

    public function search(Request $request)
    {

    }
}
