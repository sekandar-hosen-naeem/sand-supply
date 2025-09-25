@extends('backend.layouts.app')
@section('pageTitle', 'Vehicles')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Vehicles</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">Add New</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vehicle No</th>
                        <th>Type</th>
                        <th>Driver</th>
                        <th>Phone</th>
                        <th>Capacity (CFT)</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->vehicle_no }}</td>
                        <td>{{ $vehicle->type }}</td>
                        <td>{{ $vehicle->driver_name }}</td>
                        <td>{{ $vehicle->driver_phone }}</td>
                        <td>{{ $vehicle->capacity_cft }}</td>
                        <td>{{ $vehicle->status }}</td>
                        <td>
                            <a href="{{ route('vehicles.edit',$vehicle->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST" style="display:inline-block;">
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
