<?php

namespace App\Http\Controllers;

use App\Models\SandStock;
use App\Models\RiverPoint;
use App\Models\SandType;
use Illuminate\Http\Request;

class SandStockController extends Controller
{
    public function index()
    {
        $sand_stocks = SandStock::with(['riverPoint', 'sandType'])->latest()->paginate(15);
        return view('sand_stocks.index', compact('sand_stocks'));
    }

    public function create()
    {
        $river_points = RiverPoint::pluck('name', 'id');
        $sand_types = SandType::pluck('name', 'id');
        return view('sand_stocks.create', compact('river_points', 'sand_types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'river_point_id' => 'required|exists:river_points,id',
            'sand_type_id' => 'required|exists:sand_types,id',
            'available_quantity_cft' => 'required|numeric|min:0',
        ]);

        SandStock::create($request->all());

        return redirect()->route('sand_stocks.index')->with('success', 'Sand Stock created successfully!');
    }

    public function show(SandStock $sand_stock)
    {
        return view('sand_stocks.show', compact('sand_stock'));
    }

    public function edit(SandStock $sand_stock)
    {
        $river_points = RiverPoint::pluck('name', 'id');
        $sand_types = SandType::pluck('name', 'id');
        return view('sand_stocks.edit', compact('sand_stock', 'river_points', 'sand_types'));
    }

    public function update(Request $request, SandStock $sand_stock)
    {
        $request->validate([
            'river_point_id' => 'required|exists:river_points,id',
            'sand_type_id' => 'required|exists:sand_types,id',
            'available_quantity_cft' => 'required|numeric|min:0',
        ]);

        $sand_stock->update($request->all());

        return redirect()->route('sand_stocks.index')->with('success', 'Sand Stock updated successfully!');
    }

    public function destroy(SandStock $sand_stock)
    {
        $sand_stock->delete();
        return redirect()->route('sand_stocks.index')->with('success', 'Sand Stock deleted successfully!');
    }
}
