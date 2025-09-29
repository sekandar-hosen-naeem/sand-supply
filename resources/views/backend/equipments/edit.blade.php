@extends('backend.layouts.app')
@section('pageTitle', 'Edit Equipment')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Equipment</div>
        <div class="card-body">
            <form method="POST" action="{{ route('equipments.update',$equipment->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Equipment Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $equipment->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" name="type" class="form-control"
                           value="{{ old('type', $equipment->type) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Serial No</label>
                    <input type="text" name="serial_no" class="form-control"
                           value="{{ old('serial_no', $equipment->serial_no) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Purchase Date</label>
                    <input type="date" name="purchase_date" class="form-control"
                           value="{{ old('purchase_date', $equipment->purchase_date) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Purchase Cost</label>
                    <input type="number" step="0.01" name="purchase_cost" class="form-control"
                           value="{{ old('purchase_cost', $equipment->purchase_cost) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Available" {{ $equipment->status == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="In Use" {{ $equipment->status == 'In Use' ? 'selected' : '' }}>In Use</option>
                        <option value="Under Maintenance" {{ $equipment->status == 'Under Maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                        <option value="Broken" {{ $equipment->status == 'Broken' ? 'selected' : '' }}>Broken</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('equipments.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
