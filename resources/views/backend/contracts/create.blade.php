@extends('backend.layouts.app')
@section('pageTitle', 'Add Contract')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Contract</div>
        <div class="card-body">
            <form method="POST" action="{{ route('contracts.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Tender Owner</label>
                    <select name="tender_owner_id" class="form-control">
                        <option value="">-- Select Tender Owner --</option>
                        @foreach($tenderOwners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Buyer</label>
                    <select name="buyer_id" class="form-control">
                        <option value="">-- Select Buyer --</option>
                        @foreach($buyers as $b)
                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Supplier</label>
                    <select name="supplier_id" class="form-control">
                        <option value="">-- Select Supplier --</option>
                        @foreach($suppliers as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contract Value</label>
                    <input type="number" step="0.01" name="contract_value" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Terms</label>
                    <textarea name="terms" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
