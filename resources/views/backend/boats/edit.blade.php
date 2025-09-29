@extends('backend.layouts.app')
@section('pageTitle', 'Edit Boat')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Boat</div>
        <div class="card-body">
            <form method="POST" action="{{ route('boats.update',$boat->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Boat Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $boat->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Registration No</label>
                    <input type="text" name="registration_no" class="form-control"
                           value="{{ old('registration_no', $boat->registration_no) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Capacity (CFT)</label>
                    <input type="number" step="0.01" name="capacity_cft" class="form-control"
                           value="{{ old('capacity_cft', $boat->capacity_cft) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" {{ $boat->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $boat->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('boats.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
