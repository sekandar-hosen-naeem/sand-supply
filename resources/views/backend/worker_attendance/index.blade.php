@extends('backend.layouts.app')
@section('pageTitle', 'Worker Attendance Records')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Worker Attendance</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('worker-attendances.create') }}" class="btn btn-primary mb-3">Add New Record</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Worker</th>
                        <th>River Point</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $attendance)
                    <tr>
                        <td>{{ $attendance->id }}</td>
                        <td>{{ $attendance->worker?->name }}</td>
                        <td>{{ $attendance->riverPoint?->point_name ?? '-' }}</td>
                        <td>{{ $attendance->attendance_date }}</td>
                        <td>{{ $attendance->status }}</td>
                        <td>{{ $attendance->remarks }}</td>
                        <td>
                            <a href="{{ route('worker-attendances.edit',$attendance->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('worker-attendances.destroy',$attendance->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
