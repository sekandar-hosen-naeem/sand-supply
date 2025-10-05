<?php

namespace App\Http\Controllers;

use App\Models\WorkerAttendance;
use App\Models\Worker;
use App\Models\RiverPoint;
use Illuminate\Http\Request;

class WorkerAttendanceController extends Controller
{
    public function index()
    {
        $data = WorkerAttendance::with(['worker','riverPoint'])
            ->orderBy('attendance_date','desc')
            ->get();
        return view('backend.worker_attendances.index', compact('data'));
    }

    public function create()
    {
        $workers = Worker::all();
        $riverPoints = RiverPoint::all();
        return view('backend.worker_attendances.create', compact('workers','riverPoints'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'worker_id' => 'required|exists:workers,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:Present,Absent,Leave',
        ]);

        WorkerAttendance::create($request->all());
        return redirect()->route('worker-attendances.index')->with('success','Attendance recorded successfully.');
    }

    public function edit(WorkerAttendance $workerAttendance)
    {
        $workers = Worker::all();
        $riverPoints = RiverPoint::all();
        return view('backend.worker_attendances.edit', compact('workerAttendance','workers','riverPoints'));
    }

    public function update(Request $request, WorkerAttendance $workerAttendance)
    {
        $request->validate([
            'worker_id' => 'required|exists:workers,id',
            'attendance_date' => 'required|date',
            'status' => 'required|in:Present,Absent,Leave',
        ]);

        $workerAttendance->update($request->all());
        return redirect()->route('worker-attendances.index')->with('success','Attendance updated successfully.');
    }

    public function destroy(WorkerAttendance $workerAttendance)
    {
        $workerAttendance->delete();
        return redirect()->route('worker-attendances.index')->with('success','Attendance deleted successfully.');
    }
}
