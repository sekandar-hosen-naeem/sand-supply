@extends('backend.layouts.app')
@section('pageTitle', 'Add Boat Trip')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Trip</div>
        <div class="card-body">
            <form method="POST" action="{{ route('boat-trips.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Boat</label>
                    <select name="boat_id" class="form-control" required>
                        <option value="">-- Select Boat --</option>
                        @foreach($boats as $b)
                            <option value="{{ $b->id }}">{{ $b->boat_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Majhi</label>
                    <select name="majhi_id" class="form-control">
                        <option value="">-- Select Majhi --</option>
                        @foreach($majhis as $m)
                            <option value="{{ $m->id }}">{{ $m->name }}</option>
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
                    <label class="form-label">Trip Date</label>
                    <input type="date" name="trip_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity (CFT)</label>
                    <input type="number" step="0.01" name="quantity_cft" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Distance (KM)</label>
                    <input type="number" step="0.01" name="distance_km" class="form-control">
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
                <a href="{{ route('boat-trips.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
