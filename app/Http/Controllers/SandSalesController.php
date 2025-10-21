<?php

namespace App\Http\Controllers;

use App\Models\SandSale;
use App\Models\Buyer;
use App\Models\SandType;
use Illuminate\Http\Request;

class SandSalesController extends Controller
{
    public function index()
    {
        $sand_sales = SandSale::with(['buyer', 'sandType'])->latest()->paginate(15);
        return view('backend.sand_sales.index', compact('sand_sales'));
    }

    public function create()
    {
        $buyers = Buyer::pluck('name', 'id');
        $sand_types = SandType::get();
        return view('backend.sand_sales.create', compact('buyers', 'sand_types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_date' => 'required|date',
            'buyer_id' => 'required|exists:buyers,id',
            'sand_type_id' => 'required|exists:sand_types,id',
            'quantity_cft' => 'required|numeric|min:0',
            'rate_per_cft' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,partial,paid',
        ]);

        $validated['total_amount'] = $validated['quantity_cft'] * $validated['rate_per_cft'];

        SandSale::create($validated);

        return redirect()->route('sand_sales.index')->with('success', 'Sand sale created successfully!');
    }

    public function show(SandSale $sand_sale)
    {
        return view('backend.sand_sales.show', compact('sand_sale'));
    }

    public function edit(SandSale $sand_sale)
    {
        $buyers = Buyer::pluck('name', 'id');
        $sand_types = SandType::pluck('sand_name', 'id');
        return view('backend.sand_sales.edit', compact('sand_sale', 'buyers', 'sand_types'));
    }

    public function update(Request $request, SandSale $sand_sale)
    {
        $validated = $request->validate([
            'sale_date' => 'required|date',
            'buyer_id' => 'required|exists:buyers,id',
            'sand_type_id' => 'required|exists:sand_types,id',
            'quantity_cft' => 'required|numeric|min:0',
            'rate_per_cft' => 'required|numeric|min:0',
            'payment_status' => 'required|in:pending,partial,paid',
        ]);

        $validated['total_amount'] = $validated['quantity_cft'] * $validated['rate_per_cft'];

        $sand_sale->update($validated);

        return redirect()->route('sand_sales.index')->with('success', 'Sand sale updated successfully!');
    }

    public function destroy(SandSale $sand_sale)
    {
        $sand_sale->delete();
        return redirect()->route('sand_sales.index')->with('success', 'Sand sale deleted successfully!');
    }
}
