<?php

namespace App\Http\Controllers;

use App\Models\SupplyArea;
use App\Models\RiverPoint;
use Illuminate\Http\Request;

class SupplyAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SupplyArea::with('riverPoint:id,point_name')->get();

        return view('backend.supply_areas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $riverPoints = RiverPoint::all();
        return view('backend.supply_areas.create', compact('riverPoints'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'river_point_id' => 'required|exists:river_points,id',
                'cost_per_cft' => 'required|numeric|min:0',
            ]);

            SupplyArea::create($validatedData);

            return redirect()->route('supply_areas.index')
                ->with('success', 'Supply Area created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while creating the Supply Area.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SupplyArea $supplyArea)
    {
        return view('backend.supply_areas.show', compact('supplyArea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupplyArea $supplyArea)
    {
        $riverPoints = RiverPoint::all();
        return view('backend.supply_areas.edit', compact('supplyArea', 'riverPoints'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupplyArea $supplyArea)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'river_point_id' => 'required|exists:river_points,id',
                'cost_per_cft' => 'required|numeric|min:0',
            ]);

            $supplyArea->update($validatedData);

            return redirect()->route('supply_areas.index')
                ->with('success', 'Supply Area updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while updating the Supply Area.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplyArea $supplyArea)
    {
        try {
            $supplyArea->delete();

            return redirect()->route('supply_areas.index')
                ->with('success', 'Supply Area deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred while deleting the Supply Area.']);
        }
    }
}
