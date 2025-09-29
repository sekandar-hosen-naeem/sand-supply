@extends('backend.layouts.app')
@section('pageTitle', 'Edit Majhi')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Majhi</div>
        <div class="card-body">
            <form method="POST" action="{{ route('majhis.update',$majhi->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $majhi->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone', $majhi->phone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Boat Name</label>
                    <input type="text" name="boat_name" class="form-control"
                           value="{{ old('boat_name', $majhi->boat_name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Daily Wage</label>
                    <input type="number" step="0.01" name="daily_wage" class="form-control"
                           value="{{ old('daily_wage', $majhi->daily_wage) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" {{ $majhi->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $majhi->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('majhis.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
