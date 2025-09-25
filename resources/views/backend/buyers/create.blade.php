@extends('backend.layouts.app')
@section('pageTitle', 'Add Buyer')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Buyer</div>
        <div class="card-body">
            <form method="POST" action="{{ route('buyers.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('buyers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
