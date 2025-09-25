<?php
namespace App\Http\Controllers;

use App\Models\TenderOwner;
use App\Models\Tender;
use Illuminate\Http\Request;

class TenderOwnerController extends Controller
{
    public function index()
    {
        $data = TenderOwner::with('tender')->get();
        return view('backend.tender_owners.index', compact('data'));
    }

    public function create()
    {
        $tenders = Tender::all();
        return view('backend.tender_owners.create', compact('tenders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tender_id' => 'required|exists:tenders,id',
            'owner_name' => 'required|string',
        ]);

        TenderOwner::create($request->all());
        return redirect()->route('tender-owners.index')->with('success', 'Tender Owner created successfully.');
    }

    public function edit(TenderOwner $tenderOwner)
    {
        $tenders = Tender::all();
        return view('backend.tender_owners.edit', compact('tenderOwner', 'tenders'));
    }

    public function update(Request $request, TenderOwner $tenderOwner)
    {
        $request->validate([
            'tender_id' => 'required|exists:tenders,id',
            'owner_name' => 'required|string',
        ]);

        $tenderOwner->update($request->all());
        return redirect()->route('tender-owners.index')->with('success', 'Tender Owner updated successfully.');
    }

    public function destroy(TenderOwner $tenderOwner)
    {
        $tenderOwner->delete();
        return redirect()->route('tender-owners.index')->with('success', 'Tender Owner deleted successfully.');
    }
}
