@extends('backend.layouts.app')
@section('pageTitle', 'Add Invoice')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Invoice</div>
        <div class="card-body">
            <form method="POST" action="{{ route('invoices.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Invoice Date</label>
                    <input type="date" name="invoice_date" class="form-control" required>
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
                    <label class="form-label">Sand Type</label>
                    <select name="sand_type_id" class="form-control">
                        <option value="">-- Select Sand Type --</option>
                        @foreach($sandTypes as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity (CFT)</label>
                    <input type="number" step="0.01" name="quantity_cft" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rate per CFT</label>
                    <input type="number" step="0.01" name="rate_per_cft" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Payment Status</label>
                    <select name="payment_status" class="form-control">
                        <option value="Pending">Pending</option>
                        <option value="Paid">Paid</option>
                        <option value="Partial">Partial</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
