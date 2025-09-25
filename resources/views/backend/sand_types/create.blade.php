@extends('backend.layouts.app')
@section('pageTitle', 'Create Sand Type')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Sand Type</div>
        <div class="card-body">
            <form method="POST" action="{{ route('sand-types.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Sand Name</label>
                    <input type="text" name="sand_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quality Grade</label>
                    <input type="text" name="quality_grade" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price per CFT</label>
                    <input type="number" name="price_per_cft" class="form-control" step="0.01">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('sand-types.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
