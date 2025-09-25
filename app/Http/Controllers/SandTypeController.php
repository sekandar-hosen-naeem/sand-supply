<?php
namespace App\Http\Controllers;

use App\Models\SandType;
use Illuminate\Http\Request;

class SandTypeController extends Controller
{
    public function index()
    {
        $data = SandType::get();
        return view('backend.sand_types.index', compact('data'));
    }

    public function create()
    {
        return view('backend.sand_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sand_name' => 'required',
            'price_per_cft' => 'nullable|numeric'
        ]);

        SandType::create($request->all());
        return redirect()->route('sand-types.index')->with('success', 'Sand Type created successfully.');
    }

    public function edit(SandType $sandType)
    {
        return view('backend.sand_types.edit', compact('sandType'));
    }

    public function update(Request $request, SandType $sandType)
    {
        $request->validate([
            'sand_name' => 'required',
            'price_per_cft' => 'nullable|numeric'
        ]);

        $sandType->update($request->all());
        return redirect()->route('sand-types.index')->with('success', 'Sand Type updated successfully.');
    }

    public function destroy(SandType $sandType)
    {
        if ($sandType->sandStocks()->count() > 0) {
            return redirect()->route('sand-types.index')->with('error', 'Cannot delete Sand Type with associated stock.');
        }
        $sandType->delete();
        return redirect()->route('sand-types.index')->with('success', 'Sand Type deleted successfully.');
    }
}
