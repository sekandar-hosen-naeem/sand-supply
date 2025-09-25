<?php
namespace App\Http\Controllers;

use App\Models\TransportRate;
use Illuminate\Http\Request;

class TransportRateController extends Controller
{
    public function index()
    {
        $data = TransportRate::get();
        return view('backend.transport_rates.index', compact('data'));
    }

    public function create()
    {
        return view('backend.transport_rates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_type' => 'required|string',
            'capacity_cft' => 'nullable|numeric',
            'rate_per_trip' => 'required|numeric',
        ]);

        TransportRate::create($request->all());
        return redirect()->route('transport-rates.index')->with('success','Transport Rate created successfully.');
    }

    public function edit(TransportRate $transportRate)
    {
        return view('backend.transport_rates.edit', compact('transportRate'));
    }

    public function update(Request $request, TransportRate $transportRate)
    {
        $request->validate([
            'vehicle_type' => 'required|string',
            'capacity_cft' => 'nullable|numeric',
            'rate_per_trip' => 'required|numeric',
        ]);

        $transportRate->update($request->all());
        return redirect()->route('transport-rates.index')->with('success','Transport Rate updated successfully.');
    }

    public function destroy(TransportRate $transportRate)
    {
        $transportRate->delete();
        return redirect()->route('transport-rates.index')->with('success','Transport Rate deleted successfully.');
    }
}
