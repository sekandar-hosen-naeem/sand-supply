@extends('backend.layouts.app')
@section('pageTitle', 'Add Worker')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Worker</div>
        <div class="card-body">
            <form method="POST" action="{{ route('workers.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" class="form-control" placeholder="শ্রমিক/হেলপার/ড্রাইভার" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Daily Wage</label>
                    <input type="number" step="0.01" name="daily_wage" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('workers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
