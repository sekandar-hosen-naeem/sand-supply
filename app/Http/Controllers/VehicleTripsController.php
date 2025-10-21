<?php

namespace App\Http\Controllers;

use App\Models\SandSale;
use App\Models\VehicleTrip;
use App\Models\Vehicle;
use App\Models\RiverPoint;
use App\Models\SalePoint;
use App\Models\TransportRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleTripsController extends Controller
{
    public function index()
    {
        $data = VehicleTrip::with(['vehicle', 'riverPoint', 'salePoint', 'transportRate'])
            ->orderBy('trip_date', 'desc')
            ->get();
        return view('backend.vehicle_trips.index', compact('data'));
    }

    public function create(Request $request)
    {
        $qty = 0;
        if ($request->has('sales_id')) {
            $salesId = $request->input('sales_id');
            $sales = SandSale::find($salesId);
            if ($sales) {
                $qty = $sales->quantity_cft;
            }
        }
        $vehicles = Vehicle::where('type', 'truck')->get();
        $riverPoints = RiverPoint::all();
        $salePoints = SalePoint::all();
        $transportRates = TransportRate::all();
        return view('backend.vehicle_trips.create', compact('vehicles', 'riverPoints', 'salePoints', 'transportRates', 'qty'));
    }

    public function store(Request $request)
    {

        $vehicles = $request->input('vehicle_id', []);
        $rates = $request->input('transport_rate_id', []);
        $totals = $request->input('total', []);
        $quantities = $request->input('quantity_cft', []);
        $remarks = $request->input('remarks', []);

        $tripDate = $request->input('trip_date');
        $distanceKm = $request->input('distance_km');
        $topQuantity = $request->input('quantity');
        $salePointId = $request->input('sale_point_id');
        $riverPointId = $request->input('river_point_id');

        // Use transaction to ensure all-or-nothing
        DB::beginTransaction();
        try {
            foreach ($vehicles as $i => $vehicleId) {
                $vehicleTripData = [
                    'vehicle_id' => $vehicleId,
                    'trip_date' => $tripDate,
                    'distance_km' => $distanceKm,
                    // prefer per-row quantity, fallback to top-level quantity
                    'quantity_cft' => isset($quantities[$i]) && $quantities[$i] !== '' ? $quantities[$i] : ($topQuantity ?? 0),
                    // total per row (if provided)
                    'total_cost' => isset($totals[$i]) && $totals[$i] !== '' ? $totals[$i] : null,
                    'remarks' => $remarks[$i] ?? null,
                    'sale_point_id' => $salePointId ?? null,
                    'river_point_id' => $riverPointId ?? null,
                    // transport_rate_id in this form is being used to carry price; store as-is (nullable)
                    'transport_rate_id' => $rates[$i] ?? null,
                ];

                VehicleTrip::create($vehicleTripData);
            }

            DB::commit();
            return redirect()->route('vehicle-trips.index')->with('success', 'Vehicle Trip(s) created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return back()->withInput()->with('error', 'Error saving vehicle trips: ' . $e->getMessage());
        }
    }

    public function edit(VehicleTrip $vehicleTrip)
    {
        $vehicles = Vehicle::all();
        $riverPoints = RiverPoint::all();
        $salePoints = SalePoint::all();
        $transportRates = TransportRate::all();
        return view('backend.vehicle_trips.edit', compact('vehicleTrip', 'vehicles', 'riverPoints', 'salePoints', 'transportRates'));
    }

    public function update(Request $request, VehicleTrip $vehicleTrip)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'trip_date' => 'required|date',
        ]);

        $vehicleTrip->update($request->all());
        return redirect()->route('vehicle-trips.index')->with('success', 'Vehicle Trip updated successfully.');
    }

    public function destroy(VehicleTrip $vehicleTrip)
    {
        $vehicleTrip->delete();
        return redirect()->route('vehicle-trips.index')->with('success', 'Vehicle Trip deleted successfully.');
    }
}
