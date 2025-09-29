@extends('backend.layouts.app')
@section('pageTitle', 'Edit Revenue')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Revenue</div>
        <div class="card-body">
            <form method="POST" action="{{ route('revenues.update',$revenue->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $revenue->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" value="{{ old('amount', $revenue->amount) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-control">
                        <option value="Sand Sale" {{ $revenue->category=='Sand Sale' ? 'selected' : '' }}>Sand Sale</option>
                        <option value="Transport Fee" {{ $revenue->category=='Transport Fee' ? 'selected' : '' }}>Transport Fee</option>
                        <option value="Other" {{ $revenue->category=='Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Revenue Date</label>
                    <input type="date" name="revenue_date" class="form-control" value="{{ old('revenue_date', $revenue->revenue_date) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $revenue->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('revenues.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
