<?php

namespace App\Http\Controllers;

use App\Models\FuelConsumption;
use App\Models\Equipment;
use App\Models\Vehicle;
use App\Models\Boat;
use Illuminate\Http\Request;

class FuelConsumptionController extends Controller
{
    public function index()
    {
        $data = FuelConsumption::with(['equipment','vehicle','boat'])
            ->orderBy('consumption_date','desc')
            ->get();
        return view('backend.fuel_consumptions.index', compact('data'));
    }

    public function create()
    {
        $equipments = Equipment::all();
        $vehicles = Vehicle::all();
        $boats = Boat::all();
        return view('backend.fuel_consumptions.create', compact('equipments','vehicles','boats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'consumption_date' => 'required|date',
            'fuel_quantity_liters' => 'required|numeric|min:0',
            'unit_price' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();
        if (!empty($data['fuel_quantity_liters']) && !empty($data['unit_price'])) {
            $data['total_cost'] = $data['fuel_quantity_liters'] * $data['unit_price'];
        }

        FuelConsumption::create($data);
        return redirect()->route('fuel-consumptions.index')->with('success','Fuel consumption record created successfully.');
    }

    public function edit(FuelConsumption $fuelConsumption)
    {
        $equipments = Equipment::all();
        $vehicles = Vehicle::all();
        $boats = Boat::all();
        return view('backend.fuel_consumptions.edit', compact('fuelConsumption','equipments','vehicles','boats'));
    }

    public function update(Request $request, FuelConsumption $fuelConsumption)
    {
        $request->validate([
            'consumption_date' => 'required|date',
            'fuel_quantity_liters' => 'required|numeric|min:0',
            'unit_price' => 'nullable|numeric|min:0',
        ]);

        $data = $request->all();
        if (!empty($data['fuel_quantity_liters']) && !empty($data['unit_price'])) {
            $data['total_cost'] = $data['fuel_quantity_liters'] * $data['unit_price'];
        }

        $fuelConsumption->update($data);
        return redirect()->route('fuel-consumptions.index')->with('success','Fuel consumption record updated successfully.');
    }

    public function destroy(FuelConsumption $fuelConsumption)
    {
        $fuelConsumption->delete();
        return redirect()->route('fuel-consumptions.index')->with('success','Fuel consumption record deleted successfully.');
    }
}
