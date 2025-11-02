<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class FeesController extends Controller
{
    public function index()
    {
        $data = DB::select("SELECT fees.*, member.name FROM `fees` join member on member.id=fees.member_id");
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $user = Fees::create($request->all());
        return response()->json(['message' => 'User Created ', 'user' => $user, 'error' => 0], 200);
    }

    public function show($id)
    {
        $user = Fees::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found', 'error' => 1], 404);
        }
        return response()->json(['user' => $user, 'error' => 0], 200);
    }

    public function update(Request $request, $id)
    {
        $user = Fees::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found', 'error' => 1], 404);
        }

        $user->update($request->all());
        return response()->json(['message' => 'User Updated ', 'user' => $user, 'error' => 0], 200);
    }

    public function destroy($id)
    {
        $user = Fees::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found', 'error' => 1], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User Deleted ', 'error' => 0], 200);
    }


}