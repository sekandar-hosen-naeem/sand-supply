<?php
namespace App\Http\Controllers;

use App\Models\SalePoint;
use Illuminate\Http\Request;

class SalePointController extends Controller
{
    public function index()
    {
        $data = SalePoint::get();
        return view('backend.sale_points.index', compact('data'));
    }

    public function create()
    {
        return view('backend.sale_points.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'nullable|string',
            'gps_coordinates' => 'nullable|string',
        ]);

        SalePoint::create($request->all());
        return redirect()->route('sale-points.index')->with('success', 'Sale Point created successfully.');
    }

    public function edit(SalePoint $salePoint)
    {
        return view('backend.sale_points.edit', compact('salePoint'));
    }

    public function update(Request $request, SalePoint $salePoint)
    {
        $request->validate([
            'name' => 'required|string',
            'location' => 'nullable|string',
            'gps_coordinates' => 'nullable|string',
        ]);

        $salePoint->update($request->all());
        return redirect()->route('sale-points.index')->with('success', 'Sale Point updated successfully.');
    }

    public function destroy(SalePoint $salePoint)
    {
        if ($salePoint->sales()->count() > 0) {
            return redirect()->route('sale-points.index')->with('error', 'Cannot delete Sale Point with associated sales.');
        }

        $salePoint->delete();
        return redirect()->route('sale-points.index')->with('success', 'Sale Point deleted successfully.');
    }
}
