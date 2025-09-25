<?php
namespace App\Http\Controllers;

use App\Models\RiverPoint;
use Illuminate\Http\Request;

class RiverPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RiverPoint::get();
        return view('backend.river_points.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.river_points.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'point_name' => 'required'
        ]);
        RiverPoint::create($request->all());
        return redirect()->route('river-points.index')->with('success', 'River Point created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RiverPoint $riverPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RiverPoint $riverPoint)
    {
        return view('backend.river_points.edit', compact('riverPoint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RiverPoint $riverPoint)
    {
        $request->validate([
            'point_name' => 'required'
        ]);
        $riverPoint->update($request->all());
        return redirect()->route('river-points.index')->with('success', 'River Point updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RiverPoint $riverPoint)
    {
        if ($riverPoint->tenders()->count() > 0) {
            return redirect()->route('river-points.index')->with('error', 'Cannot delete River Point with associated Tenders.');
        }
        $riverPoint->delete();
        return redirect()->route('river-points.index')->with('success', 'River Point deleted successfully.');
    }
}
