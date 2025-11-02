<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class MemberController extends Controller
{
    public function index()
    {
        $data = DB::select("SELECT member.*, (SELECT sum(amount) from fees where fees.member_id=member.id and fees.pay_status=1) as paid,(SELECT sum(amount) from fees where fees.member_id=member.id and fees.pay_status=0) as due FROM `member`");
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $user = Member::create($request->all());
        return response()->json(['message' => 'User Created ', 'user' => $user, 'error' => 0], 200);
    }

    public function show($id)
    {
        $user = Member::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found', 'error' => 1], 404);
        }
        return response()->json(['user' => $user, 'error' => 0], 200);
    }

    public function update(Request $request, $id)
    {
        $user = Member::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found', 'error' => 1], 404);
        }

        $user->update($request->all());
        return response()->json(['message' => 'User Updated ', 'user' => $user, 'error' => 0], 200);
    }

    public function destroy($id)
    {
        $user = Member::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found', 'error' => 1], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User Deleted ', 'error' => 0], 200);
    }


}