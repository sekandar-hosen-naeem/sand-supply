<?php

namespace App\Http\Controllers;

use App\Models\VehicleTrip;
use App\Models\Vehicle;
use App\Models\RiverPoint;
use App\Models\SalePoint;
use App\Models\TransportRate;
use Illuminate\Http\Request;

class VehicleTripController extends Controller
{
    public function index()
    {
        $data = VehicleTrip::with(['vehicle','riverPoint','salePoint','transportRate'])
            ->orderBy('trip_date','desc')
            ->get();
        return view('backend.vehicle_trips.index', compact('data'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        $riverPoints = RiverPoint::all();
        $salePoints = SalePoint::all();
        $transportRates = TransportRate::all();
        return view('backend.vehicle_trips.create', compact('vehicles','riverPoints','salePoints','transportRates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'trip_date' => 'required|date',
            'transport_rate_id' => 'nullable|exists:transport_rates,id',
            'river_point_id' => 'nullable|exists:river_points,id',
            'sale_point_id' => 'nullable|exists:sale_points,id',
        ]);

        VehicleTrip::create($request->all());
        return redirect()->route('vehicle-trips.index')->with('success','Vehicle Trip created successfully.');
    }

    public function edit(VehicleTrip $vehicleTrip)
    {
        $vehicles = Vehicle::all();
        $riverPoints = RiverPoint::all();
        $salePoints = SalePoint::all();
        $transportRates = TransportRate::all();
        return view('backend.vehicle_trips.edit', compact('vehicleTrip','vehicles','riverPoints','salePoints','transportRates'));
    }

    public function update(Request $request, VehicleTrip $vehicleTrip)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'trip_date' => 'required|date',
        ]);

        $vehicleTrip->update($request->all());
        return redirect()->route('vehicle-trips.index')->with('success','Vehicle Trip updated successfully.');
    }

    public function destroy(VehicleTrip $vehicleTrip)
    {
        $vehicleTrip->delete();
        return redirect()->route('vehicle-trips.index')->with('success','Vehicle Trip deleted successfully.');
    }
}
