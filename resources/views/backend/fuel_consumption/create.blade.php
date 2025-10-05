@extends('backend.layouts.app')
@section('pageTitle', 'Add Fuel Consumption')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Fuel Record</div>
        <div class="card-body">
            <form method="POST" action="{{ route('fuel-consumptions.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Consumption Date</label>
                    <input type="date" name="consumption_date" class="form-control" required>
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
                    <label class="form-label">Fuel Quantity (Liters)</label>
                    <input type="number" step="0.01" name="fuel_quantity_liters" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Unit Price</label>
                    <input type="number" step="0.01" name="unit_price" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('fuel-consumptions.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
