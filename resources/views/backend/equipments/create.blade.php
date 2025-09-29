@extends('backend.layouts.app')
@section('pageTitle', 'Add Equipment')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Equipment</div>
        <div class="card-body">
            <form method="POST" action="{{ route('equipments.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Equipment Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" name="type" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Serial No</label>
                    <input type="text" name="serial_no" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Purchase Date</label>
                    <input type="date" name="purchase_date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Purchase Cost</label>
                    <input type="number" step="0.01" name="purchase_cost" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Available" selected>Available</option>
                        <option value="In Use">In Use</option>
                        <option value="Under Maintenance">Under Maintenance</option>
                        <option value="Broken">Broken</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('equipments.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
