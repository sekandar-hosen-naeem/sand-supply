<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $data = Vehicle::get();
        return view('backend.vehicles.index', compact('data'));
    }

    public function create()
    {
        return view('backend.vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_no' => 'required|string',
            'type' => 'required|string',
            'capacity_cft' => 'nullable|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        Vehicle::create($request->all());
        return redirect()->route('vehicles.index')->with('success','Vehicle created successfully.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('backend.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'vehicle_no' => 'required|string',
            'type' => 'required|string',
            'capacity_cft' => 'nullable|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        $vehicle->update($request->all());
        return redirect()->route('vehicles.index')->with('success','Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        if ($vehicle->trips()->count() > 0) {
            return redirect()->route('vehicles.index')->with('error','Cannot delete vehicle with associated trips.');
        }

        $vehicle->delete();
        return redirect()->route('vehicles.index')->with('success','Vehicle deleted successfully.');
    }
}
