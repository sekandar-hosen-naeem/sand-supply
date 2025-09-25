<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
    {
        $data = Buyer::get();
        return view('backend.buyers.index', compact('data'));
    }

    public function create()
    {
        return view('backend.buyers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
        ]);

        Buyer::create($request->all());
        return redirect()->route('buyers.index')->with('success','Buyer created successfully.');
    }

    public function edit(Buyer $buyer)
    {
        return view('backend.buyers.edit', compact('buyer'));
    }

    public function update(Request $request, Buyer $buyer)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
        ]);

        $buyer->update($request->all());
        return redirect()->route('buyers.index')->with('success','Buyer updated successfully.');
    }

    public function destroy(Buyer $buyer)
    {
        if($buyer->sales()->count() > 0){
            return redirect()->route('buyers.index')->with('error','Cannot delete Buyer with associated sales.');
        }

        $buyer->delete();
        return redirect()->route('buyers.index')->with('success','Buyer deleted successfully.');
    }
}
