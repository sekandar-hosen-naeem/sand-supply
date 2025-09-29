<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $data = Operator::all();
        return view('backend.operators.index', compact('data'));
    }

    public function create()
    {
        return view('backend.operators.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        Operator::create($request->all());
        return redirect()->route('operators.index')->with('success','Operator created successfully.');
    }

    public function edit(Operator $operator)
    {
        return view('backend.operators.edit', compact('operator'));
    }

    public function update(Request $request, Operator $operator)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $operator->update($request->all());
        return redirect()->route('operators.index')->with('success','Operator updated successfully.');
    }

    public function destroy(Operator $operator)
    {
        $operator->delete();
        return redirect()->route('operators.index')->with('success','Operator deleted successfully.');
    }
}
