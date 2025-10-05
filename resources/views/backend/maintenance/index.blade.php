@extends('backend.layouts.app')
@section('pageTitle', 'Maintenance Records')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Maintenance Records</div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('maintenances.create') }}" class="btn btn-primary mb-3">Add New</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Equipment</th>
                        <th>Vehicle</th>
                        <th>Boat</th>
                        <th>Type</th>
                        <th>Cost</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->maintenance_date }}</td>
                        <td>{{ $m->equipment?->name ?? '-' }}</td>
                        <td>{{ $m->vehicle?->vehicle_number ?? '-' }}</td>
                        <td>{{ $m->boat?->boat_name ?? '-' }}</td>
                        <td>{{ $m->maintenance_type }}</td>
                        <td>{{ number_format($m->cost,2) }}</td>
                        <td>{{ $m->description }}</td>
                        <td>
                            <a href="{{ route('maintenances.edit',$m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('maintenances.destroy',$m->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
