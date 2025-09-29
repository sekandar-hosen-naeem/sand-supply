<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        $data = Equipment::all();
        return view('backend.equipments.index', compact('data'));
    }

    public function create()
    {
        return view('backend.equipments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'purchase_cost' => 'nullable|numeric',
            'purchase_date' => 'nullable|date',
            'status' => 'required|in:Available,In Use,Under Maintenance,Broken',
        ]);

        Equipment::create($request->all());
        return redirect()->route('equipments.index')->with('success','Equipment created successfully.');
    }

    public function edit(Equipment $equipment)
    {
        return view('backend.equipments.edit', compact('equipment'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $request->validate([
            'name' => 'required|string',
            'purchase_cost' => 'nullable|numeric',
            'purchase_date' => 'nullable|date',
            'status' => 'required|in:Available,In Use,Under Maintenance,Broken',
        ]);

        $equipment->update($request->all());
        return redirect()->route('equipments.index')->with('success','Equipment updated successfully.');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('equipments.index')->with('success','Equipment deleted successfully.');
    }
}
