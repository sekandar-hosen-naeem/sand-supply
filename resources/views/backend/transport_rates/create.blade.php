@extends('backend.layouts.app')
@section('pageTitle', 'Add Transport Rate')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Transport Rate</div>
        <div class="card-body">
            <form method="POST" action="{{ route('transport-rates.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Vehicle Type</label>
                    <input type="text" name="vehicle_type" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacity (CFT)</label>
                    <input type="number" step="0.01" name="capacity_cft" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Rate per Trip</label>
                    <input type="number" step="0.01" name="rate_per_trip" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('transport-rates.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
