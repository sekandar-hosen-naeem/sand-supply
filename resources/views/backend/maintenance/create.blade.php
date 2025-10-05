@extends('backend.layouts.app')
@section('pageTitle', 'Add Maintenance')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Maintenance Record</div>
        <div class="card-body">
            <form method="POST" action="{{ route('maintenances.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Maintenance Date</label>
                    <input type="date" name="maintenance_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Maintenance Type</label>
                    <input type="text" name="maintenance_type" class="form-control" placeholder="e.g., Engine repair, oil change">
                </div>

                <div class="mb-3">
                    <label class="form-label">Equipment</label>
                    <select name="equipment_id" class="form-control">
                        <option value="">-- Select Equipment --</option>
                        @foreach($equipments as $e)
                            <option value="{{ $e->id }}">{{ $e->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Vehicle</label>
                    <select name="vehicle_id" class="form-control">
                        <option value="">-- Select Vehicle --</option>
                        @foreach($vehicles as $v)
                            <option value="{{ $v->id }}">{{ $v->vehicle_number }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Boat</label>
                    <select name="boat_id" class="form-control">
                        <option value="">-- Select Boat --</option>
                        @foreach($boats as $b)
                            <option value="{{ $b->id }}">{{ $b->boat_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cost</label>
                    <input type="number" step="0.01" name="cost" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('maintenances.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
