@extends('backend.layouts.app')
@section('pageTitle', 'Boat Trips')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Boat Trips</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('boat-trips.create') }}" class="btn btn-primary mb-3">Add New Trip</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Boat</th>
                        <th>Majhi</th>
                        <th>River Point</th>
                        <th>Sale Point</th>
                        <th>Quantity (CFT)</th>
                        <th>Total Cost</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $trip)
                    <tr>
                        <td>{{ $trip->id }}</td>
                        <td>{{ $trip->boat?->boat_name ?? '-' }}</td>
                        <td>{{ $trip->majhi?->name ?? '-' }}</td>
                        <td>{{ $trip->riverPoint?->point_name ?? '-' }}</td>
                        <td>{{ $trip->salePoint?->name ?? '-' }}</td>
                        <td>{{ $trip->quantity_cft }}</td>
                        <td>{{ number_format($trip->total_cost,2) }}</td>
                        <td>{{ $trip->trip_date }}</td>
                        <td>
                            <a href="{{ route('boat-trips.edit',$trip->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('boat-trips.destroy',$trip->id) }}" method="POST" style="display:inline-block;">
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
