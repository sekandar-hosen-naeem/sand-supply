@extends('backend.layouts.app')
@section('pageTitle', 'Transport Rates')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Transport Rates</div>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card-body">
            <a href="{{ route('transport-rates.create') }}" class="btn btn-primary mb-3">Add New</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vehicle Type</th>
                        <th>Capacity (CFT)</th>
                        <th>Rate per Trip</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $rate)
                    <tr>
                        <td>{{ $rate->id }}</td>
                        <td>{{ $rate->vehicle_type }}</td>
                        <td>{{ $rate->capacity_cft }}</td>
                        <td>{{ $rate->rate_per_trip }}</td>
                        <td>
                            <a href="{{ route('transport-rates.edit',$rate->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('transport-rates.destroy',$rate->id) }}" method="POST" style="display:inline-block;">
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
