<?php

namespace App\Http\Controllers;

use App\Models\Majhi;
use Illuminate\Http\Request;

class MajhiController extends Controller
{
    public function index()
    {
        $data = Majhi::all();
        return view('backend.majhis.index', compact('data'));
    }

    public function create()
    {
        return view('backend.majhis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'daily_wage' => 'nullable|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        Majhi::create($request->all());
        return redirect()->route('majhis.index')->with('success','Majhi created successfully.');
    }

    public function edit(Majhi $majhi)
    {
        return view('backend.majhis.edit', compact('majhi'));
    }

    public function update(Request $request, Majhi $majhi)
    {
        $request->validate([
            'name' => 'required|string',
            'daily_wage' => 'nullable|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        $majhi->update($request->all());
        return redirect()->route('majhis.index')->with('success','Majhi updated successfully.');
    }

    public function destroy(Majhi $majhi)
    {
        $majhi->delete();
        return redirect()->route('majhis.index')->with('success','Majhi deleted successfully.');
    }
}
