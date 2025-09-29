@extends('backend.layouts.app')
@section('pageTitle', 'Add Revenue')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Revenue</div>
        <div class="card-body">
            <form method="POST" action="{{ route('revenues.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-control">
                        <option value="Sand Sale" selected>Sand Sale</option>
                        <option value="Transport Fee">Transport Fee</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Revenue Date</label>
                    <input type="date" name="revenue_date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('revenues.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
