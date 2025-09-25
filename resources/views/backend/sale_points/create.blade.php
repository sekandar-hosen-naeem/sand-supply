@extends('backend.layouts.app')
@section('pageTitle', 'Add Sale Point')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Sale Point</div>
        <div class="card-body">
            <form method="POST" action="{{ route('sale-points.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">GPS Coordinates</label>
                    <input type="text" name="gps_coordinates" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('sale-points.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
