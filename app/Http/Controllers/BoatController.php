<?php

namespace App\Http\Controllers;

use App\Models\Boat;
use Illuminate\Http\Request;

class BoatController extends Controller
{
    public function index()
    {
        $data = Boat::all();
        return view('backend.boats.index', compact('data'));
    }

    public function create()
    {
        return view('backend.boats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'capacity_cft' => 'nullable|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        Boat::create($request->all());
        return redirect()->route('boats.index')->with('success','Boat created successfully.');
    }

    public function edit(Boat $boat)
    {
        return view('backend.boats.edit', compact('boat'));
    }

    public function update(Request $request, Boat $boat)
    {
        $request->validate([
            'name' => 'required|string',
            'capacity_cft' => 'nullable|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        $boat->update($request->all());
        return redirect()->route('boats.index')->with('success','Boat updated successfully.');
    }

    public function destroy(Boat $boat)
    {
        if ($boat->majhis()->count() > 0) {
            return redirect()->route('boats.index')->with('error','Cannot delete boat with assigned Majhis.');
        }
        $boat->delete();
        return redirect()->route('boats.index')->with('success','Boat deleted successfully.');
    }
}
