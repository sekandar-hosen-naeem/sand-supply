@extends('backend.layouts.app')
@section('pageTitle', 'Fuel Consumption Records')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Fuel Consumption</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('fuel-consumptions.create') }}" class="btn btn-primary mb-3">Add New Record</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Equipment</th>
                        <th>Vehicle</th>
                        <th>Boat</th>
                        <th>Quantity (L)</th>
                        <th>Unit Price</th>
                        <th>Total Cost</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $fuel)
                    <tr>
                        <td>{{ $fuel->id }}</td>
                        <td>{{ $fuel->consumption_date }}</td>
                        <td>{{ $fuel->equipment?->name ?? '-' }}</td>
                        <td>{{ $fuel->vehicle?->vehicle_number ?? '-' }}</td>
                        <td>{{ $fuel->boat?->boat_name ?? '-' }}</td>
                        <td>{{ $fuel->fuel_quantity_liters }}</td>
                        <td>{{ number_format($fuel->unit_price,2) }}</td>
                        <td>{{ number_format($fuel->total_cost,2) }}</td>
                        <td>{{ $fuel->remarks }}</td>
                        <td>
                            <a href="{{ route('fuel-consumptions.edit',$fuel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('fuel-consumptions.destroy',$fuel->id) }}" method="POST" style="display:inline-block;">
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
