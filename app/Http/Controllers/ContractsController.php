<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\TenderOwner;
use App\Models\Buyer;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $data = Contract::with(['tenderOwner','buyer','supplier'])
            ->orderBy('start_date','desc')
            ->get();
        return view('backend.contracts.index', compact('data'));
    }

    public function create()
    {
        $tenderOwners = TenderOwner::all();
        $buyers = Buyer::all();
        $suppliers = Supplier::all();
        return view('backend.contracts.create', compact('tenderOwners','buyers','suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'status' => 'required|string',
        ]);

        Contract::create($request->all());
        return redirect()->route('contracts.index')->with('success','Contract created successfully.');
    }

    public function edit(Contract $contract)
    {
        $tenderOwners = TenderOwner::all();
        $buyers = Buyer::all();
        $suppliers = Supplier::all();
        return view('backend.contracts.edit', compact('contract','tenderOwners','buyers','suppliers'));
    }

    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'start_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $contract->update($request->all());
        return redirect()->route('contracts.index')->with('success','Contract updated successfully.');
    }

    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contracts.index')->with('success','Contract deleted successfully.');
    }
}
