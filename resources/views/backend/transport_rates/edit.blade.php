@extends('backend.layouts.app')
@section('pageTitle', 'Edit Transport Rate')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Transport Rate</div>
        <div class="card-body">
            <form method="POST" action="{{ route('transport-rates.update',$transportRate->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Vehicle Type</label>
                    <input type="text" name="vehicle_type" class="form-control"
                           value="{{ old('vehicle_type', $transportRate->vehicle_type) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacity (CFT)</label>
                    <input type="number" step="0.01" name="capacity_cft" class="form-control"
                           value="{{ old('capacity_cft', $transportRate->capacity_cft) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Rate per Trip</label>
                    <input type="number" step="0.01" name="rate_per_trip" class="form-control"
                           value="{{ old('rate_per_trip', $transportRate->rate_per_trip) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('transport-rates.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
