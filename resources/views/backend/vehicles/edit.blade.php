@extends('backend.layouts.app')
@section('pageTitle', 'Edit Vehicle')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Vehicle</div>
        <div class="card-body">
            <form method="POST" action="{{ route('vehicles.update',$vehicle->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Vehicle No</label>
                    <input type="text" name="vehicle_no" class="form-control"
                           value="{{ old('vehicle_no', $vehicle->vehicle_no) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" name="type" class="form-control"
                           value="{{ old('type', $vehicle->type) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Driver Name</label>
                    <input type="text" name="driver_name" class="form-control"
                           value="{{ old('driver_name', $vehicle->driver_name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Driver Phone</label>
                    <input type="text" name="driver_phone" class="form-control"
                           value="{{ old('driver_phone', $vehicle->driver_phone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacity (CFT)</label>
                    <input type="number" step="0.01" name="capacity_cft" class="form-control"
                           value="{{ old('capacity_cft', $vehicle->capacity_cft) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" {{ $vehicle->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $vehicle->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
