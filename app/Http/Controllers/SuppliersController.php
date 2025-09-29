<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $data = Supplier::all();
        return view('backend.suppliers.index', compact('data'));
    }

    public function create()
    {
        return view('backend.suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'status' => 'required|in:Active,Inactive',
        ]);

        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('success','Supplier created successfully.');
    }

    public function edit(Supplier $supplier)
    {
        return view('backend.suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'status' => 'required|in:Active,Inactive',
        ]);

        $supplier->update($request->all());
        return redirect()->route('suppliers.index')->with('success','Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success','Supplier deleted successfully.');
    }
}
