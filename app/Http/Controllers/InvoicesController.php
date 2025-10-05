<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Buyer;
use App\Models\TenderOwner;
use App\Models\SandType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function index()
    {
        $data = Invoice::with(['buyer','tenderOwner','sandType'])
            ->orderBy('invoice_date','desc')
            ->get();
        return view('backend.invoices.index', compact('data'));
    }

    public function create()
    {
        $buyers = Buyer::all();
        $tenderOwners = TenderOwner::all();
        $sandTypes = SandType::all();
        return view('backend.invoices.create', compact('buyers','tenderOwners','sandTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice_date' => 'required|date',
            'buyer_id' => 'nullable|exists:buyers,id',
            'quantity_cft' => 'required|numeric|min:0',
            'rate_per_cft' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['invoice_number'] = 'INV-' . strtoupper(Str::random(6));
        $data['total_amount'] = $data['quantity_cft'] * $data['rate_per_cft'];

        Invoice::create($data);
        return redirect()->route('invoices.index')->with('success','Invoice created successfully.');
    }

    public function edit(Invoice $invoice)
    {
        $buyers = Buyer::all();
        $tenderOwners = TenderOwner::all();
        $sandTypes = SandType::all();
        return view('backend.invoices.edit', compact('invoice','buyers','tenderOwners','sandTypes'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'invoice_date' => 'required|date',
            'quantity_cft' => 'required|numeric|min:0',
            'rate_per_cft' => 'required|numeric|min:0',
        ]);

        $data = $request->all();
        $data['total_amount'] = $data['quantity_cft'] * $data['rate_per_cft'];

        $invoice->update($data);
        return redirect()->route('invoices.index')->with('success','Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success','Invoice deleted successfully.');
    }
}
