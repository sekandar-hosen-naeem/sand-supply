@extends('backend.layouts.app')
@section('pageTitle', 'Edit Invoice')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Edit Invoice</div>
        <div class="card-body">
            <form method="POST" action="{{ route('invoices.update',$invoice->id) }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label">Invoice Date</label>
                    <input type="date" name="invoice_date" class="form-control" value="{{ $invoice->invoice_date }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity (CFT)</label>
                    <input type="number" step="0.01" name="quantity_cft" class="form-control" value="{{ $invoice->quantity_cft }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Rate per CFT</label>
                    <input type="number" step="0.01" name="rate_per_cft" class="form-control" value="{{ $invoice->rate_per_cft }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Payment Status</label>
                    <select name="payment_status" class="form-control">
                        <option value="Pending" {{ $invoice->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Paid" {{ $invoice->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                        <option value="Partial" {{ $invoice->payment_status == 'Partial' ? 'selected' : '' }}>Partial</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks" class="form-control">{{ $invoice->remarks }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
