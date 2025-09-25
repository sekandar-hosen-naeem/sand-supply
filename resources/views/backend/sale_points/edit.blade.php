@extends('backend.layouts.app')
@section('pageTitle', 'Edit Sale Point')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Sale Point</div>
        <div class="card-body">
            <form method="POST" action="{{ route('sale-points.update', $salePoint->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $salePoint->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control"
                           value="{{ old('location', $salePoint->location) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">GPS Coordinates</label>
                    <input type="text" name="gps_coordinates" class="form-control"
                           value="{{ old('gps_coordinates', $salePoint->gps_coordinates) }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('sale-points.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
