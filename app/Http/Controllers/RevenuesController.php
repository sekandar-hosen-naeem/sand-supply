<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index()
    {
        $data = Revenue::orderBy('revenue_date','desc')->get();
        return view('backend.revenues.index', compact('data'));
    }

    public function create()
    {
        return view('backend.revenues.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'revenue_date' => 'nullable|date',
            'category' => 'required|in:Sand Sale,Transport Fee,Other',
        ]);

        Revenue::create($request->all());
        return redirect()->route('revenues.index')->with('success','Revenue created successfully.');
    }

    public function edit(Revenue $revenue)
    {
        return view('backend.revenues.edit', compact('revenue'));
    }

    public function update(Request $request, Revenue $revenue)
    {
        $request->validate([
            'title' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'revenue_date' => 'nullable|date',
            'category' => 'required|in:Sand Sale,Transport Fee,Other',
        ]);

        $revenue->update($request->all());
        return redirect()->route('revenues.index')->with('success','Revenue updated successfully.');
    }

    public function destroy(Revenue $revenue)
    {
        $revenue->delete();
        return redirect()->route('revenues.index')->with('success','Revenue deleted successfully.');
    }
}
