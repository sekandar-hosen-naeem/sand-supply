@extends('backend.layouts.app')
@section('pageTitle', 'Edit Contract')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Contract</div>
        <div class="card-body">
            <form method="POST" action="{{ route('contracts.update',$contract->id) }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ $contract->start_date }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{ $contract->end_date }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contract Value</label>
                    <input type="number" step="0.01" name="contract_value" class="form-control" value="{{ $contract->contract_value }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active" {{ $contract->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Completed" {{ $contract->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Cancelled" {{ $contract->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Terms</label>
                    <textarea name="terms" class="form-control" rows="3">{{ $contract->terms }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
