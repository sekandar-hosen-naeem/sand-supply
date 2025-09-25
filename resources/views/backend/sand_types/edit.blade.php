@extends('backend.layouts.app')
@section('pageTitle', 'Edit Sand Type')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Sand Type</div>
        <div class="card-body">
            <form method="POST" action="{{ route('sand-types.update', $sandType->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Sand Name</label>
                    <input type="text" name="sand_name" class="form-control"
                           value="{{ old('sand_name', $sandType->sand_name) }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quality Grade</label>
                    <input type="text" name="quality_grade" class="form-control"
                           value="{{ old('quality_grade', $sandType->quality_grade) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price per CFT</label>
                    <input type="number" name="price_per_cft" class="form-control" step="0.01"
                           value="{{ old('price_per_cft', $sandType->price_per_cft) }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('sand-types.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
