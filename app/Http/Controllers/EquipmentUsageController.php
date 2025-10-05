<?php

namespace App\Http\Controllers;

use App\Models\EquipmentUsage;
use App\Models\Equipment;
use App\Models\Operator;
use App\Models\RiverPoint;
use Illuminate\Http\Request;

class EquipmentUsageController extends Controller
{
    public function index()
    {
        $data = EquipmentUsage::with(['equipment','operator','riverPoint'])
            ->orderBy('usage_date','desc')
            ->get();
        return view('backend.equipment_usages.index', compact('data'));
    }

    public function create()
    {
        $equipments = Equipment::all();
        $operators = Operator::all();
        $riverPoints = RiverPoint::all();
        return view('backend.equipment_usages.create', compact('equipments','operators','riverPoints'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'equipment_id' => 'required|exists:equipments,id',
            'usage_date' => 'required|date',
            'hours_used' => 'nullable|numeric|min:0',
            'fuel_used_liters' => 'nullable|numeric|min:0',
        ]);

        EquipmentUsage::create($request->all());
        return redirect()->route('equipment-usages.index')->with('success','Equipment usage record created successfully.');
    }

    public function edit(EquipmentUsage $equipmentUsage)
    {
        $equipments = Equipment::all();
        $operators = Operator::all();
        $riverPoints = RiverPoint::all();
        return view('backend.equipment_usages.edit', compact('equipmentUsage','equipments','operators','riverPoints'));
    }

    public function update(Request $request, EquipmentUsage $equipmentUsage)
    {
        $request->validate([
            'equipment_id' => 'required|exists:equipments,id',
            'usage_date' => 'required|date',
        ]);

        $equipmentUsage->update($request->all());
        return redirect()->route('equipment-usages.index')->with('success','Equipment usage record updated successfully.');
    }

    public function destroy(EquipmentUsage $equipmentUsage)
    {
        $equipmentUsage->delete();
        return redirect()->route('equipment-usages.index')->with('success','Equipment usage record deleted successfully.');
    }
}
