<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Equipment;
use App\Models\Vehicle;
use App\Models\Boat;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $data = Maintenance::with(['equipment','vehicle','boat'])
            ->orderBy('maintenance_date','desc')
            ->get();
        return view('backend.maintenances.index', compact('data'));
    }

    public function create()
    {
        $equipments = Equipment::all();
        $vehicles = Vehicle::all();
        $boats = Boat::all();
        return view('backend.maintenances.create', compact('equipments','vehicles','boats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'maintenance_date' => 'required|date',
            'cost' => 'nullable|numeric|min:0',
        ]);

        Maintenance::create($request->all());
        return redirect()->route('maintenances.index')->with('success','Maintenance record added successfully.');
    }

    public function edit(Maintenance $maintenance)
    {
        $equipments = Equipment::all();
        $vehicles = Vehicle::all();
        $boats = Boat::all();
        return view('backend.maintenances.edit', compact('maintenance','equipments','vehicles','boats'));
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $request->validate([
            'maintenance_date' => 'required|date',
            'cost' => 'nullable|numeric|min:0',
        ]);

        $maintenance->update($request->all());
        return redirect()->route('maintenances.index')->with('success','Maintenance record updated successfully.');
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return redirect()->route('maintenances.index')->with('success','Maintenance record deleted successfully.');
    }
}
