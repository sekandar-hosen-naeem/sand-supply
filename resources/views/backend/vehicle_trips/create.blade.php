@extends('backend.layouts.app')
@section('pageTitle', 'Add Vehicle Trip')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Trip</div>
        <div class="card-body">
            <form method="POST" action="{{ route('vehicle-trips.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Vehicle</label>
                    <select name="vehicle_id" class="form-control" required>
                        <option value="">-- Select Vehicle --</option>
                        @foreach($vehicles as $v)
                            <option value="{{ $v->id }}">{{ $v->vehicle_number }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">River Point</label>
                    <select name="river_point_id" class="form-control">
                        <option value="">-- Select River Point --</option>
                        @foreach($riverPoints as $rp)
                            <option value="{{ $rp->id }}">{{ $rp->point_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sale Point</label>
                    <select name="sale_point_id" class="form-control">
                        <option value="">-- Select Sale Point --</option>
                        @foreach($salePoints as $sp)
                            <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Transport Rate</label>
                    <select name="transport_rate_id" class="form-control">
                        <option value="">-- Select Rate --</option>
                        @foreach($transportRates as $tr)
                            <option value="{{ $tr->id }}">{{ $tr->rate_name ?? 'Rate #'.$tr->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Trip Date</label>
                    <input type="date" name="trip_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Distance (KM)</label>
                    <input type="number" step="0.01" name="distance_km" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity (CFT)</label>
                    <input type="number" step="0.01" name="quantity_cft" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Cost</label>
                    <input type="number" step="0.01" name="total_cost" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('vehicle-trips.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
