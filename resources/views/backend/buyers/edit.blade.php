@extends('backend.layouts.app')
@section('pageTitle', 'Edit Buyer')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Buyer</div>
        <div class="card-body">
            <form method="POST" action="{{ route('buyers.update', $buyer->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $buyer->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control"
                           value="{{ old('company_name', $buyer->company_name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone', $buyer->phone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control">{{ old('address', $buyer->address) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('buyers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
