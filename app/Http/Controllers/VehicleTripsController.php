<?php
namespace App\Http\Controllers;

use App\Models\VehicleTrip;
use App\Models\Vehicle;
use App\Models\SalePoint;
use App\Models\Buyer;
use Illuminate\Http\Request;

class VehicleTripController extends Controller
{
    public function index()
    {
        $trips = VehicleTrip::with(['vehicle', 'sourcePoint', 'destinationPoint'])
            ->latest()
            ->paginate(15);

        return view('vehicle_trips.index', compact('trips'));
    }

    public function create()
    {
        $vehicles = Vehicle::all();
        $salePoints = SalePoint::all();
        $buyers = Buyer::all();
        return view('vehicle_trips.create', compact('vehicles', 'salePoints', 'buyers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_name' => 'required|string|max:255',
            'trip_date' => 'required|date',
            'source_point_id' => 'required|exists:sale_points,id',
            'destination_point_id' => 'required|exists:buyers,id',
            'quantity_cft' => 'required|numeric|min:0',
            'rate_per_cft' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
        ]);

        VehicleTrip::create($request->all());

        return redirect()->route('vehicle_trips.index')->with('success', 'Vehicle Trip created successfully.');
    }

    public function edit($id)
    {
        $trip = VehicleTrip::findOrFail($id);
        $vehicles = Vehicle::all();
        $salePoints = SalePoint::all();
        $buyers = Buyer::all();
        return view('vehicle_trips.edit', compact('trip', 'vehicles', 'salePoints', 'buyers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_name' => 'required|string|max:255',
            'trip_date' => 'required|date',
            'source_point_id' => 'required|exists:sale_points,id',
            'destination_point_id' => 'required|exists:buyers,id',
            'quantity_cft' => 'required|numeric|min:0',
            'rate_per_cft' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
        ]);

        $trip = VehicleTrip::findOrFail($id);
        $trip->update($request->all());

        return redirect()->route('vehicle_trips.index')->with('success', 'Vehicle Trip updated successfully.');
    }

    public function destroy($id)
    {
        $trip = VehicleTrip::findOrFail($id);
        $trip->delete();

        return redirect()->route('vehicle_trips.index')->with('success', 'Vehicle Trip deleted successfully.');
    }
}
