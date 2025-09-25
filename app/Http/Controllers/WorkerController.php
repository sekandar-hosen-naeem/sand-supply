<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $data = Worker::get();
        return view('backend.workers.index', compact('data'));
    }

    public function create()
    {
        return view('backend.workers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'daily_wage' => 'nullable|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        Worker::create($request->all());
        return redirect()->route('workers.index')->with('success','Worker created successfully.');
    }

    public function edit(Worker $worker)
    {
        return view('backend.workers.edit', compact('worker'));
    }

    public function update(Request $request, Worker $worker)
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'daily_wage' => 'nullable|numeric',
            'status' => 'required|in:Active,Inactive',
        ]);

        $worker->update($request->all());
        return redirect()->route('workers.index')->with('success','Worker updated successfully.');
    }

    public function destroy(Worker $worker)
    {
        if($worker->attendances()->count() > 0){
            return redirect()->route('workers.index')->with('error','Cannot delete worker with attendance records.');
        }
        $worker->delete();
        return redirect()->route('workers.index')->with('success','Worker deleted successfully.');
    }
}
