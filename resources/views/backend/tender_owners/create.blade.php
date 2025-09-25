@extends('backend.layouts.app')
@section('pageTitle', 'Add Tender Owner')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add New Tender Owner</div>
        <div class="card-body">
            <form method="POST" action="{{ route('tender-owners.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Select Tender</label>
                    <select class="form-control" name="tender_id" required>
                        <option value="">-- Select Tender --</option>
                        @foreach($tenders as $tender)
                            <option value="{{ $tender->id }}">{{ $tender->tender_no }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Owner Name</label>
                    <input type="text" name="owner_name" class="form-control" required>
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
                <a href="{{ route('tender-owners.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
