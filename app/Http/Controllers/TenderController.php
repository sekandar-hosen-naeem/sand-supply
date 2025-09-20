<?php

namespace App\Http\Controllers;

use App\Models\Tender;
use App\Models\RiverPoint;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Tender::get();
        return view('backend.tenders.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $river_point=RiverPoint::get();
        return view('backend.tenders.create',compact('river_point'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'river_point_id'=>'required',
            'tender_no'=>'required',
            'tender_rate_per_cft'=>'required',
            'start_date'=>'required',
            'status'=>'required',
        ]);
        Tender::create($request->all());
        return redirect()->route('tenders.index')->with('success','Tender created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tender $tender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tender $tender)
    {
        $river_point=RiverPoint::get();
        return view('backend.tenders.edit',compact('tender','river_point'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tender $tender)
    {
        $request->validate([
            'river_point_id'=>'required',
            'tender_no'=>'required',
            'tender_rate_per_cft'=>'required',
            'start_date'=>'required',
            'status'=>'required',
        ]);
        $tender->update($request->all());
        return redirect()->route('tenders.index')->with('success','Tender updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tender $tender)
    {
        $tender->delete();
        return redirect()->route('tenders.index')->with('success','Tender deleted successfully.');
    }
}
