<?php

namespace App\Http\Controllers;

use App\Models\BoatTrip;
use App\Models\Boat;
use App\Models\Majhi;
use App\Models\RiverPoint;
use App\Models\SalePoint;
use Illuminate\Http\Request;

class BoatTripController extends Controller
{
    public function index()
    {
        $data = BoatTrip::with(['boat','majhi','riverPoint','salePoint'])
            ->orderBy('trip_date','desc')
            ->get();
        return view('backend.boat_trips.index', compact('data'));
    }

    public function create()
    {
        $boats = Boat::all();
        $majhis = Majhi::all();
        $riverPoints = RiverPoint::all();
        $salePoints = SalePoint::all();
        return view('backend.boat_trips.create', compact('boats','majhis','riverPoints','salePoints'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'boat_id' => 'required|exists:boats,id',
            'trip_date' => 'required|date',
            'majhi_id' => 'nullable|exists:majhis,id',
            'river_point_id' => 'nullable|exists:river_points,id',
            'sale_point_id' => 'nullable|exists:sale_points,id',
        ]);

        BoatTrip::create($request->all());
        return redirect()->route('boat-trips.index')->with('success','Boat Trip created successfully.');
    }

    public function edit(BoatTrip $boatTrip)
    {
        $boats = Boat::all();
        $majhis = Majhi::all();
        $riverPoints = RiverPoint::all();
        $salePoints = SalePoint::all();
        return view('backend.boat_trips.edit', compact('boatTrip','boats','majhis','riverPoints','salePoints'));
    }

    public function update(Request $request, BoatTrip $boatTrip)
    {
        $request->validate([
            'boat_id' => 'required|exists:boats,id',
            'trip_date' => 'required|date',
        ]);

        $boatTrip->update($request->all());
        return redirect()->route('boat-trips.index')->with('success','Boat Trip updated successfully.');
    }

    public function destroy(BoatTrip $boatTrip)
    {
        $boatTrip->delete();
        return redirect()->route('boat-trips.index')->with('success','Boat Trip deleted successfully.');
    }
}
