@extends('backend.layouts.app')
@section('pageTitle', 'Edit Tender Owner')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Tender Owner</div>
        <div class="card-body">
            <form method="POST" action="{{ route('tender-owners.update', $tenderOwner->id) }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label class="form-label">Select Tender</label>
                    <select class="form-control" name="tender_id" required>
                        @foreach($tenders as $tender)
                            <option value="{{ $tender->id }}" 
                                {{ $tenderOwner->tender_id == $tender->id ? 'selected' : '' }}>
                                {{ $tender->tender_no }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Owner Name</label>
                    <input type="text" name="owner_name" class="form-control"
                           value="{{ old('owner_name', $tenderOwner->owner_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" class="form-control"
                           value="{{ old('company_name', $tenderOwner->company_name) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone', $tenderOwner->phone) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control">{{ old('address', $tenderOwner->address) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('tender-owners.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
