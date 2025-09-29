@extends('backend.layouts.app')
@section('pageTitle', 'Add Boat')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Boat</div>
        <div class="card-body">
            <form method="POST" action="{{ route('boats.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Boat Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Registration No</label>
                    <input type="text" name="registration_no" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacity (CFT)</label>
                    <input type="number" step="0.01" name="capacity_cft" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('boats.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
