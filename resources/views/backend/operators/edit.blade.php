@extends('backend.layouts.app')
@section('pageTitle', 'Edit Operator')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Operator</div>
        <div class="card-body">
            <form method="POST" action="{{ route('operators.update',$operator->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $operator->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $operator->phone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control">{{ old('address', $operator->address) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" {{ $operator->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $operator->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('operators.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
