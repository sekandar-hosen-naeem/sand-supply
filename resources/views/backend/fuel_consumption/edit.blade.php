@extends('backend.layouts.app')
@section('pageTitle', 'Edit Fuel Consumption')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Fuel Record</div>
        <div class="card-body">
            <form method="POST" action="{{ route('fuel-consumptions.update',$fuelConsumption->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Consumption Date</label>
                    <input type="date" name="consumption_date" class="form-control" value="{{ $fuelConsumption->consumption_date }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fuel Quantity (Liters)</label>
                    <input type="number" step="0.01" name="fuel_quantity_liters" class="form-control" value="{{ $fuelConsumption->fuel_quantity_liters }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Unit Price</label>
                    <input type="number" step="0.01" name="unit_price" class="form-control" value="{{ $fuelConsumption->unit_price }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control">{{ $fuelConsumption->remarks }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('fuel-consumptions.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
