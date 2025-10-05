@extends('backend.layouts.app')
@section('pageTitle', 'Edit Boat Trip')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Trip</div>
        <div class="card-body">
            <form method="POST" action="{{ route('boat-trips.update',$boatTrip->id) }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label">Boat</label>
                    <select name="boat_id" class="form-control" required>
                        @foreach($boats as $b)
                            <option value="{{ $b->id }}" {{ $boatTrip->boat_id == $b->id ? 'selected' : '' }}>
                                {{ $b->boat_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Majhi</label>
                    <select name="majhi_id" class="form-control">
                        @foreach($majhis as $m)
                            <option value="{{ $m->id }}" {{ $boatTrip->majhi_id == $m->id ? 'selected' : '' }}>
                                {{ $m->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">River Point</label>
                    <select name="river_point_id" class="form-control">
                        @foreach($riverPoints as $rp)
                            <option value="{{ $rp->id }}" {{ $boatTrip->river_point_id == $rp->id ? 'selected' : '' }}>
                                {{ $rp->point_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Sale Point</label>
                    <select name="sale_point_id" class="form-control">
                        @foreach($salePoints as $sp)
                            <option value="{{ $sp->id }}" {{ $boatTrip->sale_point_id == $sp->id ? 'selected' : '' }}>
                                {{ $sp->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Trip Date</label>
                    <input type="date" name="trip_date" class="form-control" value="{{ $boatTrip->trip_date }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity (CFT)</label>
                    <input type="number" step="0.01" name="quantity_cft" class="form-control" value="{{ $boatTrip->quantity_cft }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Cost</label>
                    <input type="number" step="0.01" name="total_cost" class="form-control" value="{{ $boatTrip->total_cost }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control">{{ $boatTrip->remarks }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('boat-trips.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
