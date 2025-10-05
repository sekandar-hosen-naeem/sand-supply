@extends('backend.layouts.app')
@section('pageTitle', 'Edit Maintenance')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Maintenance Record</div>
        <div class="card-body">
            <form method="POST" action="{{ route('maintenances.update',$maintenance->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Maintenance Date</label>
                    <input type="date" name="maintenance_date" class="form-control" value="{{ $maintenance->maintenance_date }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Maintenance Type</label>
                    <input type="text" name="maintenance_type" class="form-control" value="{{ $maintenance->maintenance_type }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Cost</label>
                    <input type="number" step="0.01" name="cost" class="form-control" value="{{ $maintenance->cost }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $maintenance->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('maintenances.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
