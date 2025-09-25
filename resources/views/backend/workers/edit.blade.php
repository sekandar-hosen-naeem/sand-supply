@extends('backend.layouts.app')
@section('pageTitle', 'Edit Worker')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Worker</div>
        <div class="card-body">
            <form method="POST" action="{{ route('workers.update',$worker->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $worker->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone', $worker->phone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" class="form-control"
                           value="{{ old('role', $worker->role) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Daily Wage</label>
                    <input type="number" step="0.01" name="daily_wage" class="form-control"
                           value="{{ old('daily_wage', $worker->daily_wage) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" {{ $worker->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $worker->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('workers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
