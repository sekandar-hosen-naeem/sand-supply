@extends('backend.layouts.app')
@section('pageTitle', 'Add Vehicle')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Vehicle</div>
        <div class="card-body">
            <form method="POST" action="{{ route('vehicles.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Vehicle No</label>
                    <input type="text" name="vehicle_no" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" name="type" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Driver Name</label>
                    <input type="text" name="driver_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Driver Phone</label>
                    <input type="text" name="driver_phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacity (CFT)</label>
                    <input type="number" step="0.01" name="capacity_cft" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
