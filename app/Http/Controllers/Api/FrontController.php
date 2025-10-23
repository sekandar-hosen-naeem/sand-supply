<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SupplyArea;
use App\Models\RiverPoint;
use App\Models\SandType;
use Illuminate\Http\Request;
use Validator;

class FrontController extends Controller
{
    public function supplyAreas()
    {
        $supplyAreas = SupplyArea::all();
        return response()->json($supplyAreas);
    }

    public function riverPoints()
    {
        $riverPoints = RiverPoint::all();
        return response()->json($riverPoints);
    }

    public function sandTypes()
    {
        $sandTypes = SandType::all();
        return response()->json($sandTypes);
    }

    public function saveSandOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required',
            'river_point' => 'required|exists:river_points,id',
            'sand_type' => 'required|exists:sand_types,id',
            'estimated_price' => 'required',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {

            $checkBuyer = \App\Models\Buyer::where('phone', $request->phone)->first();
            if (!$checkBuyer) {
                $buyer = new \App\Models\Buyer();
                $buyer->name = $request->name;
                $buyer->phone = $request->phone;
                $buyer->save();
            } else {
                $buyer = $checkBuyer;
            }

            $sandOrder = new \App\Models\SandSale();
            $sandOrder->sale_date = now();
            $sandOrder->buyer_id = $buyer->id;
            $sandOrder->sand_type_id = $request->sand_type;
            $sandOrder->quantity_cft = $request->quantity;
            $sandOrder->rate_per_cft = $request->rate_per_cft;
            $sandOrder->river_point_id = $request->river_point;
            $sandOrder->total_amount = $request->estimated_price;
            $sandOrder->save();
            return response()->json(['message' => 'Sand order saved successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        // For example:
        // SandOrder::create([
        //     'quantity' => $request->quantity,
        //     'river_point_id' => $request->river_point,
        //     'sand_type_id' => $request->sand_type,
        //     'estimated_transport_cost' => $request->estimated_transport_cost,
        //     'estimated_price' => $request->estimated_price,
        // ]);

        return response()->json(['message' => 'Sand order saved successfully']);
    }
}